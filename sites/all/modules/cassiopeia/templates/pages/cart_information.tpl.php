<?php
$cart_infore = cassiopeia_order_get_cart_infore();
$total = 0;
if(empty($cart_infore['products'])) {
  drupal_set_message(t('Please choose a product.'));
  drupal_goto('/');
}
?>


<div class="page-order">
  <div class="page-order-container container">
    <div class="page-order-inner row">
      <div class="block-right col-xs-12 col-sm-8 col-md-8">
        <div class="page-order-main">
          <?php
            $cassiopeia_wms_order_cart_payment_form = drupal_get_form('cassiopeia_wms_order_cart_payment_form');
            $cassiopeia_wms_order_cart_payment_form = drupal_render($cassiopeia_wms_order_cart_payment_form);
            print($cassiopeia_wms_order_cart_payment_form);
          ?>

        </div>
      </div>

      <div class="block-right col-xs-12 col-sm-4 col-md-4">
        <div class="shop-cart-sidebar">

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
            <div class="product-order">
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
                <li>
                  <span><?php print(t('Quantity')); ?>:</span>
                  <span><?php print($quantity); ?></span>
                </li>
              </ul>
            </div>
          <?php endforeach; ?>
          <ul>
            <li>
              <span><?php print(t('Provisional')); ?></span>
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
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
