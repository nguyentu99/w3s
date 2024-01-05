<?php
global $language;
$cart_infore = cassiopeia_order_get_cart_infore();
$total = 0;

if(empty($cart_infore['products'])) {
  drupal_set_message(t('Please choose a product.'));
  drupal_goto('/');
}
?>

<div class="page-shop-cart">
  <div class="page-shop-cart-container container">
    <div class="page-shop-cart-inner row">
      <div class="col-md-12 page-title">
        <h1><?php print(t('Your cart')); ?>:</h1>
      </div>

      <div class="block-left col-xs-12 col-sm-12 col-md-8">
        <div class="shop-cart-main">
          <form id="cart" action="#">
            <?php foreach ($cart_infore['products'] as $product): ?>
              <?php
                $category = taxonomy_term_load($product['product']->field_tx_product['und'][0]['tid']);
                $material = $product['material'];
                $sex = $product['sex'];
                $inscribed = $product['inscribed'];
                $quantity = $product['quantity'];
                $price  = $product['quantity']*$product['price'];
                $total = $total + $price;
              ?>
              <div class="box-order">
                  <a href="#" class="deleteCartItem" data-product-id="<?php print($product['product']->nid); ?>" data-product-material="<?php print($product['material']->tid); ?>" data-product-sex="<?php print($product['sex']); ?>"><span class="fa fa-close"></span></a>
                  <div class="box-order-img">
                    <a href="/<?php print($language->language) ?>/<?php print(drupal_get_path_alias('node/'.$product['product']->nid)); ?>">
                      <?php
                        if (!empty($product['product']->field_image['und'][0])) {
                          $product_img = (array)  $product['product']->field_image['und'][0];
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
                    </a>
                  </div>
                  <div class="box-order-info">
                    <h2><?php print($category->name . ' ' .$product['product']->title); ?></h2>
                    <ul>
                      <li>
                        <span><?php print(t('Material')); ?>:</span>
                        <span><?php print($material->name); ?></span>
                      </li>
                      <li>
                        <span><?php print(t('Sex')); ?>:</span>
                        <span><?php print(($product['sex']==1)?t('Male'):( ($product['sex']==2)?t('Female'):'')); ?></span>
                      </li>
                      <li>
                        <span><?php print(t('Inscribed')); ?>:</span>
                        <span><?php print($inscribed); ?></span>
                      </li>
                    </ul>
                    <div class="amount">
                      <span class="minus">-</span>
                      <input class="quantity" data-product-id="<?php print($product['product']->nid); ?>" data-product-material="<?php print($product['material']->tid); ?>" data-product-sex="<?php print($product['sex']); ?>" type="number" value="<?php print($quantity); ?>" step="1" min="0" max="999">
                      <span class="plus">+</span>
                    </div>
                  </div>
              </div>
            <?php endforeach; ?>
          </form>
        </div>
      </div>

      <div class="block-right col-xs-12 col-sm-12 col-md-4">
        <div class="shop-cart-sidebar">
          <ul>
            <li>
              <?php print(t('Provisional')); ?>
              <span><?php print(number_format($total, 0, ',', '.')); ?>đ</span>
            </li>
            <li>
              <span><?php print(t('Transport fee')); ?></span>
              <span><?php print(number_format($cart_infore['transport_fee'], 0, ',', '.')); ?>đ</span>
            </li>
            <li>
              <span><?php print(t('Into money')); ?></span>
              <span><?php print(number_format($total + $cart_infore['transport_fee'], 0, ',', '.')); ?>đ</span>
            </li>
            <li>
              <a href="/<?php print($language->language) ?>/cart/information" class="btn-buy btn-black"><?php print(t('Order now'));  ?></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
