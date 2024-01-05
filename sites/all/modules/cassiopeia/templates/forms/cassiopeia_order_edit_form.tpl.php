<?php
$order_status = array(
    0=>'Hủy',
    1=>'Hoàn thành',
    2=>'Chờ'
);

?>

<div class="box box-solid">
    <div class="box-body">
        <div class="box box-solid no-shadow order-receiver" id="order-receiver">
            <div class="box-header no-padding-left no-padding-right" style="padding-left: 0px; padding-right: 0px;">
                <h3 class="box-title">Thông tin khách hàng</h3>
            </div>
            <div class="box-body no-padding">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <div class="form-item form-type-item form-group">
                            <label class="control-label">Họ tên</label>
                            <div class="form-control">
                                <?php print ($form['#order']->receiver_name); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="form-item form-type-item form-group">
                            <label class="control-label">Số điện thoại</label>
                            <div class="form-control"><?php print ($form['#order']->receiver_phonenumber); ?></div>
                        </div>
                    </div>

                    <div class="col-md-4 form-group">
                        <div class="form-item form-type-item form-group">
                            <label class="control-label">Email</label>
                            <div class="form-control"><?php print ($form['#order']->receiver_email);?></div>
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="form-item form-type-item form-group">
                            <label class="control-label">Địa chỉ</label>
                            <div class="form-control like-textarea"><?php print ($form['#order']->receiver_address);?></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="box no-shadow order-items" id="#order-items">
            <div class="box-header no-padding-left no-padding-right" style="padding-left: 0px; padding-right: 0px;">
                <h3 class="box-title">Sản phẩm / dịch vụ</h3>
            </div>
            <div class="box-body no-padding">
                <div class="row order-item-body">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="item-stt">STT</th>
                                <th class="item-title">Tên Sản Phẩm / dịch vụ</th>
                                <th class="item-unit">Chất liệu</th>
                                <th class="item-unit">Giới tính</th>
                                <th class="item-unit">Khắc chứ</th>
                                <th class="item-quantity">Số lượng</th>
                                <th class="item-price">Đơn giá</th>
                                <th class="item-total">Thành tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $item_stt = 1; ?>
                                <?php foreach ($form['#order']->product_items as $product_item_key => $product_item): ?>
                                    <tr>
                                        <td class="item-stt"><?php print $item_stt; ?></td>
                                        <td class="item-suk"><?php print($product_item->product_name); ?></td>
                                        <td class="item-title"><?php print($product_item->product_material); ?></td>
                                        <td class="item-unit"><?php print(($product_item->product_sex == 1)?'Nam':'Nữ'); ?></td>
                                        <td class="item-quantity" width="60px"><?php print($product_item->product_quantity); ?></td>
                                        <td class="item-tax"><?php  print ($product_item->product_inscribed); ?></td>
                                        <td class="item-price"><?php print (number_format($product_item->product_price,0,',', '.')); ?></td>
                                        <td class="item-total">
                                            <?php print(number_format($product_item->product_price*$product_item->product_quantity, 0, ',','.').' vnđ'); ?>
                                        </td>
                                    </tr>
                                    <?php $item_stt = $item_stt +1; ?>
                                <?php endforeach; ?>
                                <tr>
                                    <td class="item-stt"><?php print $item_stt; ?></td>
                                    <td class="item-suk">Phí vận chuyển</td>
                                    <td class="item-title"></td>
                                    <td class="item-unit"></td>
                                    <td class="item-quantity" width="60px"></td>
                                    <td class="item-tax"></td>
                                    <td class="item-price"></td>
                                    <td class="item-total">
                                        <?php print(number_format($form['#order']->transport_fee, 0, ',','.').' vnđ'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="item-stt" colspan="8" style="text-align: right;">
                                        Tổng tiền: <?php print(number_format($form['#order']->transport_fee + $form['#order']->total, 0, ',','.').' vnđ'); ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php if (!empty($form['#order']->receiver_note)): ?>
            <div class="box no-shadow">
                <div class="box-header no-padding-left no-padding-right" style="padding-left: 0px; padding-right: 0px;">
                    <h3 class="box-title">Ghi chú</h3>
                </div>
                <div class="box-body no-padding">
                    <div style="padding: 5px; border-radius: 4px; border: 1px solid #ccc">
                        <?php print($form['#order']->receiver_note); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="box no-shadow">
            <div class="box-body no-padding">
                <div style="margin-top: 30px; display: flex;     justify-content: space-between;">
                    <div style="width: 50%;">
                        <span style="margin-right: 5px;">Trạng thái:</span>
                        <?php if ($form['#order']->status == 1): ?>
                            <span class="badge bg-aqua"><?php print($order_status[$form['#order']->status]); ?></span>
                        <?php elseif ($form['#order']->status == 2): ?>
                            <span class="badge bg-green"><?php print($order_status[$form['#order']->status]); ?></span>
                        <?php elseif ($form['#order']->status == 0): ?>
                            <span class="badge bg-red"><?php print($order_status[$form['#order']->status]); ?></span>
                        <?php endif; ?>
                    </div>
                    <div style="width: 50%;  display: flex; justify-content: flex-end;">
                        <?php
                        if (isset($form['complete'])) {
                            print('<div style="margin-left:5px;">'.render($form['complete']).'</div>');
                        }
                        if (isset($form['cancel'])) {
                            print ('<div style="margin-left:5px;">'.render($form['cancel']).'</div>');
                        }
                        //                            if (isset($form['delete'])) {
                        //                                print('<div style="margin-left:5px;">'. render($form['delete']).'</div>');
                        //                            }
                        ?>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<div style="width: 0px; height: 0px; overflow: hidden; opacity: 0;">
    <?php print drupal_render_children($form); ?>
</div>
