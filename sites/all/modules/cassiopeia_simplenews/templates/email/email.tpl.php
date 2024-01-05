<?php
/**
 * Created by PhpStorm.
 * User: VDP
 * Date: 28/09/2017
 * Time: 10:40 AM
 */

global $base_url;
$site_name = variable_get('site_name');
$hotline = variable_get('hotline');
$email = variable_get('site_mail');
$data = $variables['data'];

?>

<table  style="padding:20px;font-family:Arial,Helvetica,sans-serif;font-size:12px" border="0" cellpadding="0" cellspacing="0">
  <tbody>
  <tr>
    <td style="border-bottom:1px solid #ccc;padding-bottom:10px">
      <table width="100%" border="0" cellpadding="3" cellspacing="0">
        <tbody>
        <tr>
          <td style="text-align: center;">
            <h1 class="logo">
              <a href="<?php print($base_url.'/') ?>"><img src="<?php print($base_url .'/sites/all/themes/cassiopeia_theme/logo.png'); ?>"></a>
            </h1>
          </td>

        </tr>
        <tr>
          <td style="color:#000;font-size:20px;vertical-align:middle; text-align: center;">
            <strong><?php print($site_name);?></strong>
          </td>
        </tr>
        <tr>
          <td style="color:#000;vertical-align:middle; text-align: center;"> Bài viết mới <?php print(l($data['node']->title, 'node/'.$data['node']->nid)); ?> </td>
        </tr>

        </tbody>
      </table>
    </td>
  </tr>
  <tr>
    <td>
      <h1 style="text-align: center; font-size: 16px;">THÔNG TIN</h1>
    </td>
  </tr>
  <tr style=" margin-bottom:15px;width: 100%; display: grid;">
    <td style="border: 1px solid #ccc;">
      <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
        <tbody>
        <tr style="background-color: #001539; color: white; padding-top: 5px; padding-bottom: 5px;"><td colspan="2" style="padding:5px 20px;"><strong>THÔNG TIN BÀI VIẾT</strong></td></tr>
        <tr>
          <td>
            <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
              <tbody>
              <tr style="background: #f6f6f6;">
                <td width="180" style="padding:5px 20px;"><strong>Tiêu đề</strong></td>
                <td style="padding:5px 20px;"><?php print($data['node']->title); ?></td>
              </tr>
              <?php if (!empty($data['node']->field_tx_article['und'][0]['tid'])): ?>
              <?php $category = taxonomy_term_load($data['node']->field_tx_article['und'][0]['tid']);  ?>
              <?php if (!empty($category->name)): ?>
              <tr>
                <td style="padding:5px 20px;"><strong>Danh mục</strong></td>
                <td style="padding:5px 20px;"><?php print($category->name); ?></td>
              </tr>
              <?php endif; ?>
              <?php endif; ?>
              <tr style="background: #f6f6f6;">
                <td style="padding:5px 20px;"><strong>Ngày tạo</strong></td>
                <td style="padding:5px 20px;"><?php print( date('d/m/Y H:i',$data['node']->created)); ?></td>
              </tr>
              <tr style="background: #f6f6f6;">
                <td style="padding:5px 20px;"><strong>Xem chi tiết</strong></td>
                <td style="padding:5px 20px;"><?php print(l('Chi tiết', 'node/'.$data['node']->nid)); ?></td>
              </tr>

              </tbody>
            </table>
          </td>
        </tr>
        </tbody>
      </table>
    </td>
  </tr>
  </tbody>
</table>