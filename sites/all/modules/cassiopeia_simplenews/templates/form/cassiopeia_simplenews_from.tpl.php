<?php


?>

<div class="form-group">
  <?php print drupal_render($form['email']); ?>
</div>

<div class="form-group">
    <?php print drupal_render_children($form); ?>
</div>