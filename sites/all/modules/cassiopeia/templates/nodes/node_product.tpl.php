<?php
global $language;
$product = $variables['node'];
$category = taxonomy_term_load($product->field_tx_product['und'][0]['tid']);

$product_in_collections = array();
$product_in_collection_query = new EntityFieldQuery();
$product_in_collection_query->entityCondition('entity_type', 'node')
  ->entityCondition('bundle', 'ctype_product')
  ->propertyCondition('status', NODE_PUBLISHED)
  ->fieldCondition('field_tx_product', 'tid', $category->tid, '=');

$product_in_collection_query_result = $product_in_collection_query->execute();
if (!empty($product_in_collection_query_result['node'])) {
  $product_in_collectio_nids = array_keys($product_in_collection_query_result['node']);
  $product_in_collections = entity_load('node', $product_in_collectio_nids);
}
$prices = array();
$price_data = array();
$materials = array();
$sexs = array(1=>t('Male'), 0=>t('Female'));

$material_selected = null;
$sex_selected = null;
$price_selected = null;

if(!empty($product->field_ctype_product_prices['und'])) {
  $prices = _cassiopeia_load_collections ($product->field_ctype_product_prices['und']);
}
foreach ($prices as $price) {
  if(empty($materials[$price->field_material['und'][0]['tid']])) {
    $material = taxonomy_term_load($price->field_material['und'][0]['tid']);
    $materials[$material->tid] = $material->name;
  }
  $price_data[] = array(
    'material' => $price->field_material['und'][0]['tid'],
    'sex' => $price->field_sex['und'][0]['value'],
    'price' => number_format($price->field_price['und'][0]['value'], 0, ',', '.') ,
  );
}

if(!empty($price_data)) {
  $material_selected = $price_data[0]['material'];
  $sex_selected = $price_data[0]['sex'];
  $price_selected = $price_data[0]['price'];
}

drupal_add_js(array(
  'prices' => $price_data,
), 'setting');

$_facebook_url = variable_get('facebook_url');;
$_instagram_url = variable_get('instagram_url', '');
$_google_plus_url = variable_get('google_plus_url');

?>

<div class="page-product">
  <div class="page-product-container container">
    <div class="page-product-inner row">
      <div class="block-left col-xs-12 col-sm-6 col-md-6">
        <div class="sample-products">
          <!-- <div class="recording">
              <button type="button" class="btn-icon btn-recording">
                  <span class="icon"><img src="/sites/all/themes/cassiopeia_theme/img/icons/icon-6.png" alt=""></span>
                  <span>Thu âm giọng nói của bạn</span>
              </button>
          </div> -->
          <div class="product-img">
            <?php
              if (!empty($product->field_image['und'][0])) {
                $product_img = (array) $product->field_image['und'][0];
                $product_img['style_name'] = 'style_553x553';
                $product_img['path'] = $product_img['uri'];
                $product_img = theme('image_style', $product_img);
              }
              else {
                $product_img = theme('image_style', [
                  'path' => 'public://default/default-image-medium.jpg',
                  'style_name' => 'style_553x553',
                  'attributes' => array('class' => array('img-responsive'))
                ]);
              }
              print($product_img);
            ?>
          </div>
        </div>
      </div>

      <div class="block-left col-xs-12 col-sm-6 col-md-6">
        <div class="product-options">
          <h1><?php print($category->name); ?></h1>

          <form id="addproduct" action="#">
            <div>
              <div class="input-group-option">
                <ul>
                  <li class="expanded">
                    <div>
                      <span><?php print(t('Product')); ?></span>
                      <span class="name-product">
                        <?php 
                          if($language->language == 'en') {
                            print($product->title.' '.$category->name); 
                          } else {
                            print($category->name.' '.$product->title);
                          }
                        ?>
                      </span>
                    </div>
                    <ul class="product-option">
                      <?php foreach ($product_in_collections as $_product_): ?>
                        <li>
                          <a href="/<?php print($language->language); ?>/<?php print(drupal_get_path_alias('node/'.$_product_->nid)); ?>">
                            <div class="item-product">
                              <?php
                              if (!empty($_product_->field_image['und'][0])) {
                                $_product_img_ = (array) $_product_->field_image['und'][0];
                                $_product_img_['style_name'] = 'style_328x328';
                                $_product_img_['path'] = $_product_img_['uri'];
                                $_product_img_ = theme('image_style', $_product_img_);
                              }
                              else {
                                $_product_img_ = theme('image_style', [
                                  'path' => 'public://default/default-image-medium.jpg',
                                  'style_name' => 'style_328x328',
                                  'attributes' => array('class' => array('img-responsive'))
                                ]);
                              }
                              print($_product_img_);
                              ?>
                              <span><?php print($_product_->title); ?></span>
                            </div>
                          </a>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  </li>
                  <li>
                    <div class="input-info">
                      <span><?php print(t('Material')); ?></span>
                      <div class="product-material">
                        <select name="material" id="material">
                          <?php foreach ($materials as $material_key => $material_value): ?>
                            <option value="<?php print($material_key); ?>" <?php if($material_selected == $material_key){print('selected');} ?>><?php print($material_value); ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div>
                      <span><?php print(t('Sex')); ?></span>
                      <label class="mask-input">
                        <?php print(t('Male')) ?>
                        <input type="radio" name="gender" <?php if($sex_selected != null &&  $sex_selected == 1){print('checked');} ?> value="1">
                        <span class="mask-checked"></span>
                      </label>
                      <label class="mask-input">
                        <?php print(t('Female')) ?>
                        <input type="radio" name="gender" <?php if($sex_selected != null &&  $sex_selected == 2){print('checked');} ?> value="2">
                        <span class="mask-checked"></span>
                      </label>
                    </div>
                  </li>
                  <li>
                    <div class="input-info">
                      <span><?php print(t('Inscribed')); ?></span>
                      <div class="form-input-name">
                        <form action="#">
                          <div>
                            <div class="input-name">
                              <input type="text" name="inscribed" placeholder="<?php print(t('Enter the text to be engraved...')); ?>">
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <!-- <div class="input-group-message">
                  <span>Ghi chú</span>
                  <textarea name="" id=""></textarea>
                  <span>ít hơn 30 ký tự</span>
              </div> -->
              <div class="input-group-button">
                <span id="pricetext" ><?php print(($price_selected != null)?($price_selected.'đ'):t('contact')) ?></span>
                <a href="#" type="submit" class="btn-black btn-add-cart" data-id="<?php  print($product->nid); ?>">
                  <span class="icon"><img src="/sites/all/themes/cassiopeia_theme/img/icons/icon-7.png" alt=""></span>
                  <span><?php print(t('Add to cart')); ?></span>
                </a>
                <!-- <button type="submit" class="btn-black btn-add-cart">
                    <span class="icon"><img src="/sites/all/themes/cassiopeia_theme/img/icons/icon-7.png" alt=""></span>
                    <span>Cho vào giỏ hàng</span>
                </button> -->
              </div>
            </div>
          </form>

          <div class="social">
            <ul>
              <li>
                <a href="<?php print($_facebook_url); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
              </li>
              <li>
                <a href="<?php print($_instagram_url); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
              </li>
              <li>
                <a href="<?php print($_google_plus_url); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="block-other-product">
      <div class="block-other-product-slide">
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="/sites/all/themes/cassiopeia_theme/img/product-img-9.png" class="img-responsive" alt=""></div>
            <div class="swiper-slide"><img src="/sites/all/themes/cassiopeia_theme/img/product-img-10.png" class="img-responsive" alt=""></div>
            <div class="swiper-slide"><img src="/sites/all/themes/cassiopeia_theme/img/product-img-11.png" class="img-responsive" alt=""></div>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </div>
</div>
