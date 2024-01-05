<?php



function cassiopeia_simplenews_config_form() {

  $form = array();

  $form['cassiopeia_config_simplenews'] = array(
    '#type' => "fieldset",
    '#title' => 'Đăng ký nhận bản tin',
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );

  $form['cassiopeia_config_simplenews']['simplenews_node_category'] = array(
    '#type' => 'select',
    '#title' => 'Danh mục bài viết',
    '#options' => taxonomy_allowed_values(field_info_field('field_tx_article')),
    '#default_value' => variable_get('simplenews_node_category'),
    '#multiple' => TRUE,
    '#required' => TRUE,
    '#chosen' => TRUE,
  );

  $form['cassiopeia_config_simplenews']['simplenews_node_send_mail'] = array(
    '#type' => 'checkbox',
    '#title' => 'Gửi mail khi có bài viết mới',
    '#default_value' => variable_get('simplenews_node_send_mail'),
  );

  $form['#submit'][] = 'cassiopeia_simplenews_config_submit';

  return system_settings_form($form);
}


function cassiopeia_simplenews_config_submit ($form, &$form_state) {

}



