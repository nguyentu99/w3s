<?php

?>


<div class="form-title"><?php print(t('Shipment Details')); ?></div>
<div class="input-group">
  <label><?php print(t('Full name')); ?>:</label>
  <?php print render($form['receiver_name']); ?>
</div>
<div class="input-group">
  <label><?php print(t('Phone number')); ?>:</label>
  <?php print render($form['receiver_phonenumber']); ?>
</div>
<div class="input-group">
  <label><?php print(t('Email')); ?>:</label>
  <?php print render($form['receiver_email']); ?>
</div>
<div class="input-group">
  <label><?php print(t('Delivery address')); ?>:</label>
  <?php print render($form['receiver_address']); ?>
</div>
<div class="input-group">
  <label><?php print(t('Delivery notes')); ?>:</label>
  <?php print render($form['receiver_note']); ?>
</div>
<div class="input-group">
  <?php print render($form['submit']); ?>
</div>


<div style="width: 0px; height: 0px; overflow: hidden; opacity: 0;">
  <?php print drupal_render_children($form); ?>
</div>
