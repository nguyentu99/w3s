<div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for=""><?php print t('Full name');?></label>
               <?php print render($form['name']); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for=""><?php print t('Phone');?></label>
                <?php print render($form['phone']); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Email</label>
                <?php print render($form['email']); ?>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for=""><?php print t('Nội dung');?></label>
                <?php print render($form['message']); ?>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-action">
               <?php print render($form['submit']); ?>
            </div>
        </div>
    </div>
</div>


<div style="width: 0; height: 0; overflow: hidden; opacity: 0;">
   <?php print drupal_render_children($form); ?>
</div>
