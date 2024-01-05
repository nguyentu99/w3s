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

$order_status = array(
   0=>'Hủy',
   1=>'Hoàn thành',
   2=>'Chờ'
);


$orders = array();

$default_customer = '';
$default_product ='';
$default_status = '';


$orders_query = db_select('cassiopeia_orders', 'o');
$orders_query->fields('o');

if (isset($_GET['customer']) && $_GET['customer'] != '') {
    $default_customer = $_GET['customer'];
    $customer_query_or = db_or();
    $customer_query_or->condition('o.receiver_name', '%'.$_GET['customer'].'%', 'LIKE');
    $customer_query_or->condition('o.receiver_phonenumber', '%'.$_GET['customer'].'%', 'LIKE');
    $customer_query_or->condition('o.receiver_email', '%'.$_GET['customer'].'%', 'LIKE');
    $orders_query->condition($customer_query_or);

}

if (isset($_GET['product']) && $_GET['product'] != '') {
    $default_product = $_GET['product'];
    $product_query = db_select('cassiopeia_order_products', 'product');
    $product_query->fields('product', array('oid'));
    $product_query->addExpression("GROUP_CONCAT(product.product_name)", 'product_names');
    $product_query->addExpression("GROUP_CONCAT(product.product_quantity)", 'product_quantitys');
    $product_query->addExpression("GROUP_CONCAT(product.product_material)", 'product_materials');
    $product_query->groupBy('product.oid');

    $product_query_or = db_or();
    $product_query_or->condition('product.product_names', '%'.$_GET['product'].'%', 'LIKE');
    $product_query_or->condition('product.product_materials', '%'.$_GET['product'].'%', 'LIKE');

    $orders_query->leftJoin($product_query, 'product', 'product.oid = o.id');
    $orders_query->condition($product_query_or);

}

if (isset($_GET['status']) && $_GET['status'] != '') {
    $default_status = $_GET['status'];
    if ($_GET['status'] != 'all') {
        $orders_query->condition('o.status', $_GET['status'],'=');
    }
}

if ($s_created_timestamp != $s_created_timestamp) {
    if ($s_created_timestamp) {
        $orders_query->condition('created', $s_created_timestamp,'>=');
    }
    if ($s_created_timestamp) {
        $orders_query->condition('created', $s_created_timestamp,'<=');
    }
}else {
    if ($s_created_timestamp && $e_created_timestamp) {
        $orders_query->condition('created', $s_created_timestamp,'>=');
        $orders_query->condition('created', strtotime('+1 day', $e_created_timestamp),'<');
    }
}
$orders_query->orderBy('o.created', 'DESC');
$orders = $orders_query->execute() ->fetchAll();
$limit = 30;
$page = pager_default_initialize(count($orders), $limit, 0);
$offset = $limit * $page;
$_orders_ = array_slice($orders, $offset, $limit);

foreach ($_orders_ as $key => $order) {
    $product_items = db_select('cassiopeia_order_products', 'product')
        ->fields('product')
        ->condition('oid', $order->id)
        ->execute()
        ->fetchAll();
    $order->product_items = $product_items;
    $_orders_[$key] = $order;
}

?>


<div class="orders-page">
    <div class="orders-page-container">

        <div class="box box-solid ">
            <div class="box-body">
                <div class="dataTables_wrapper dt-bootstrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="get">
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label>Khách hàng</label>
                                        <input type="text" class="form-control" name="customer" value="<?php print($default_customer); ?>">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Sản phẩm</label>
                                        <input type="text" class="form-control" name="product" value="<?php print($default_product); ?>">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Trạng thái</label>
                                        <select class="form-control" name="status">
                                            <option value="all" <?php if (!is_numeric($default_status) && $default_status == 'all'){print('selected');} ?>>-- Tất cả --</option>
                                            <option value="2" <?php if (is_numeric($default_status) && $default_status == 2){print('selected');} ?>>Đang giao dịch</option>
                                            <option value="1" <?php if (is_numeric($default_status) && $default_status == 1){print('selected');} ?>>Thành công</option>
                                            <option value="0" <?php if (is_numeric($default_status) && $default_status == 0){print('selected');} ?>>Hủy</option>
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
                                    <th>Khách hàng</th>
                                    <th>Sản phẩm</th>
                                    <th style="text-align: center;">Phí vận chuyển</th>
                                    <th style="text-align: center;">Giá trị</th>
                                    <th style="text-align: center;">Thàn tiên</th>
                                    <th style="text-align: center;">Ngày tạo</th>
                                    <th style="text-align: center;">Trạng thái</th>
                                    <th style="width: 34px;text-align: center;"><span class="fa fa-eye"></span></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($_orders_ as $order): ?>
                                    <tr role="row">
                                        <td>
                                            <div><b>Họ tên:</b> <span><?php print($order->receiver_name); ?></span></div>
                                            <div><b>Số điện thoại:</b> <span><?php print($order->receiver_phonenumber); ?></span></div>
                                            <div><b>Email:</b> <span><?php print($order->receiver_email); ?></span></div>
                                            <div><b>Địa chỉ:</b> <span><?php print($order->receiver_address); ?></span></div>
                                            <div><b>Ghi chú:</b> <span><?php print($order->receiver_note); ?></span></div>
                                        </td>
                                        <td>
                                            <?php foreach($order->product_items as $product_item): ?>
                                                <div style="margin-bottom: 8px;">
                                                    <div><b>Sản phẩm:</b> <span><?php print($product_item->product_name); ?></span></div>
                                                    <div><b>Chất liệu:</b> <span><?php print($product_item->product_material); ?></span></div>
                                                    <div><b>Giới tính:</b> <span><?php print(($product_item->product_sex == 1)?'Nam':'Nữ'); ?></span></div>
                                                    <div><b>Số lượng:</b> <span><?php print($product_item->product_quantity); ?></span></div>
                                                    <div><b>Khắc chữ:</b> <span><?php  print($product_item->product_inscribed); ?></span></div>
                                                    <div><b>Đơn giá:</b> <span><?php print(number_format($product_item->product_price, 0, ',', '.')); ?></span></div>
                                                </div>
                                            <?php endforeach; ?>
                                        </td>
                                        <td style="text-align:center;width: 120px;">
                                            <?php print(number_format($order->transport_fee, 0, ',', '.')); ?>
                                        </td>
                                        <td style="text-align: center; width: 120px;">
                                            <?php print(number_format($order->total, 0, ',', '.')); ?>
                                        </td>
                                        <td style="text-align: center;width: 120px">
                                            <?php print(number_format($order->total + $order->transport_fee, 0, ',', '.')); ?>
                                        </td>
                                        <td style="text-align: center;width: 120px;"><?php print(date('d/m/Y', $order->created)); ?></td>
                                        <td style="text-align: center; width: 120px;">
                                            <?php if ($order->status == 1): ?>
                                                <span class="badge bg-aqua"><?php print($order_status[$order->status]); ?></span>
                                            <?php elseif ($order->status == 2): ?>
                                                <span class="badge bg-green"><?php print($order_status[$order->status]); ?></span>
                                            <?php elseif ($order->status == 0): ?>
                                                <span class="badge bg-red"><?php print($order_status[$order->status]); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td style="width: 34px;text-align: center;"><a class="btn btn-primary btn-sm" href="/admin/order/<?php print($order->id); ?>/edit"><span class="fa fa-eye"></span></a></td>
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
