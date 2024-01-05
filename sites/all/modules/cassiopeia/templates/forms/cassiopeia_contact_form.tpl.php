<?php

?>



<div class="form-group">
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
    <?php print render($form['email']); ?>
  </div>
</div>
<div class="form-group">
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
    <?php print render($form['phonenumber']); ?>
  </div>
</div>
<div class="form-group">
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
    <?php print render($form['address']); ?>
  </div>
</div>
<div class="form-group">
  <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea">
    <?php print render($form['message']); ?>
<!--    <div class="grippie">-->
<!--    </div>-->
  </div>
</div>
<?php print render($form['submit']); ?>
<div style="width: 0px; height: 0px; overflow: hidden; opacity: 0;">
  <?php print drupal_render_children($form); ?>
</div>

