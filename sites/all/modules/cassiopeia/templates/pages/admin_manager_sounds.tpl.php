<?php
drupal_add_library('system', 'ui.datepicker');

$s_created = null;
$e_created = null;
$s_created_timestamp = null;
$e_created_timestamp = null;


if (isset($_GET['s_created'])) {
    $s_created = DateTime::createFromFormat("!d-m-Y",$_GET['s_created']);

    if ($s_created) {
        $s_created_timestamp = $s_created->getTimestamp();
    }
}
if (isset($_GET['e_created'])) {
    $e_created = DateTime::createFromFormat("!d-m-Y", $_GET['e_created']);
    if ($e_created) {
        $e_created_timestamp = $e_created->getTimestamp();
    }
}

$sound_status = array(
   0=>'✖',
   1=>'✔'
);


$sounds = array();

$default_title = '';
$default_status = '';




$sounds_query = new EntityFieldQuery();
$sounds_query->entityCondition('entity_type', 'node');
$sounds_query->entityCondition('bundle', 'ctype_sound');

if (isset($_GET['title']) && $_GET['title'] != '') {
    $default_title = $_GET['title'];
    $sounds_query->propertyCondition('title', '%'.$_GET['title'].'%', 'LIKE');
}

if (isset($_GET['status']) && $_GET['status'] != '') {
    $default_status = $_GET['status'];
    if ($_GET['status'] != 'all') {
        $sounds_query->propertyCondition('status', $_GET['status'], '=');
    }
}

if ($s_created_timestamp != $s_created_timestamp) {
    if ($s_created_timestamp) {
        $sounds_query->propertyCondition('created', $s_created_timestamp,'>=');

    }
    if ($s_created_timestamp) {
        $sounds_query->propertyCondition('created', $s_created_timestamp,'<=');
    }
}else {
    if ($s_created_timestamp && $e_created_timestamp) {
        $sounds_query->propertyCondition('created', $s_created_timestamp,'>=');
        $sounds_query->propertyCondition('created', strtotime('+1 day', $e_created_timestamp),'<');
    }
}

$sounds_query->propertyOrderBy('created', 'DESC');
$result = $sounds_query->execute();
if (isset($result['node'])) {
    $sound_nids = array_keys($result['node']);
    $sounds = entity_load('node', $sound_nids);
}


$limit = 30;
$page = pager_default_initialize(count($sounds), $limit, 0);
$offset = $limit * $page;
$_sounds_ = array_slice($sounds, $offset, $limit);


?>


<div class="sounds-page">
    <div class="sounds-page-container">

        <div class="box box-solid ">
            <div class="box-body">
                <div class="dataTables_wrapper dt-bootstrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="get">
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label>Tiêu đề</label>
                                        <input type="text" class="form-control" name="title" value="<?php print($default_title); ?>">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Trạng thái</label>
                                        <select class="form-control" name="status">
                                            <option value="all" <?php if (!is_numeric($default_status) && $default_status == 'all'){print('selected');} ?>>-- Tất cả --</option>
                                            <option value="0" <?php if (is_numeric($default_status) && $default_status == 2){print('selected');} ?>>✖</option>
                                            <option value="1" <?php if (is_numeric($default_status) && $default_status == 1){print('selected');} ?>>✔</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Từ ngày</label>
                                        <input type="text" class="form-control" id="s-created" name="s_created">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Đến ngày</label>
                                        <input type="text" class="form-control" id="e-created" name="e_created">
                                    </div>
                                    <button style="margin-top:25px; " type="submit" class="btn btn-info btn-flat"><span class="fa fa-search"></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped table-hover dataTable">
                                <thead>
                                <tr role="row">
                                    <th>Tiêu đề</th>
                                    <th>Link</th>
                                    <th style="text-align: center;">Mở rộng</th>
                                    <th style="text-align: center;">Nghe</th>
                                    <th style="text-align: center;">Ngày tạo</th>
                                    <th style="text-align: center;">Trạng thái</th>
                                    <th style="width: 34px;text-align: center;"><span class="fa fa-eye"></span></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($_sounds_ as $_sound_): ?>
                                    <tr role="row">
                                        <td><?php print($_sound_->title); ?></td>
                                        <td><?php print(file_create_url($_sound_->field_ctype_sound_file['und'][0]['uri'])); ?></td>
                                        <td style="text-align: center;">
                                            <?php print($_sound_->field_ctype_sound_file['und'][0]['filemime']); ?>
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="#" class="sound-play" data-title="<?php print($_sound_->title); ?>" data-type="<?php print($_sound_->field_ctype_sound_file['und'][0]['filemime']); ?>" data-url="<?php print(file_create_url($_sound_->field_ctype_sound_file['und'][0]['uri'])); ?>"><span class="fa fa-play-circle-o"></span></a>
                                        </td>
                                        <td style="text-align: center;width: 120px;"><?php print(date('d/m/Y', $_sound_->created)); ?></td>
                                        <td style="text-align: center; width: 120px;">
                                            <?php if ($_sound_->status == 1): ?>
                                                ✔
                                            <?php elseif ($_sound_->status == 0): ?>
                                                ✖
                                            <?php endif; ?>
                                        </td>
                                        <td style="width: 34px;text-align: center;"><a class="btn btn-primary btn-sm" href="/node/<?php print($_sound_->nid); ?>/edit"><span class="fa fa-eye"></span></a></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="dataTables_paginate paging_simple_numbers">
                                <?php print (theme('pager',  array('tags' => array('«','‹','','›','»'))));?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript">

    (function ($) {
        $(document).ready(function () {

            $('a.sound-play').click(function(e){
                var _this_ = $(this);
                var title = _this_.attr('data-title');
                var url = _this_.attr('data-url');
                var type = _this_.attr('data-type');
                $.dialog({
                    title: title,
                    content: '<audio style="width: 100%;" controls>\n' +
                        '  <source src=" '+url+' " type="'+type+'">\n' +
                        'Your browser does not support the audio element.\n' +
                        '</audio>',
                });

                return false;
            });

            $("#s-created").datepicker({
                dateFormat: "dd-mm-yy",
                changeMonth: true,
                changeYear: true,
                onSelect: function (text) {
                    if ($("#e-created").datepicker('getDate'))  {
                        var s_created = new Date($("#s-created").datepicker('getDate'));
                        var e_created = new Date($("#e-created").datepicker('getDate'));
                        if (s_created.getTime() > e_created.getTime()) {
                            $("#s-created").datepicker("setDate" , $.datepicker.formatDate( "dd-mm-yy", e_created));
                        }
                    }

                },
                beforeShow: function(e) {
                    setTimeout(function(){
                        $('.ui-datepicker').css('z-index', 9999);
                    }, 0);
                }
            });

            <?php if($s_created): ?>
            $("#s-created").datepicker("setDate" , "<?php print($_GET['s_created']); ?>");
            <?php endif; ?>

            $("#e-created").datepicker({
                dateFormat: "dd-mm-yy",
                changeMonth: true,
                changeYear: true,
                onSelect: function (text) {
                    var s_created = new Date($("#s-created").datepicker('getDate'));
                    var e_created = new Date($("#e-created").datepicker('getDate'));
                    if (s_created.getTime() > e_created.getTime()) {
                        $("#e-created").datepicker("setDate" , $.datepicker.formatDate( "dd-mm-yy", s_created));
                    }
                },
                beforeShow: function(e) {
                    setTimeout(function(){
                        $('.ui-datepicker').css('z-index', 9999);
                    }, 0);
                }
            });

            <?php if($e_created): ?>
            $("#e-created").datepicker("setDate" , "<?php print($_GET['e_created']); ?>");
            <?php endif; ?>

        });
    })(jQuery);

</script>
