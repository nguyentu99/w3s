<?php



function cassiopeia_3s_config_form() {

  $form = array();

  $form['cassiopeia_3s_config_site']['3s_hotline'] = array(
    '#type' => "textfield",
    '#title' => t('Hotline'),
    "#default_value" => variable_get('3s_hotline', ''),
  );

  $form['cassiopeia_3s_config_site']['3s_title'] = array(
    '#type' => "textfield",
    '#title' => t('Title'),
    "#default_value" => variable_get('3s_title', ''),
  );

  $_body = variable_get('3s_content', array(
    'value' => '',
    'format' => 'full_html'
  ));

  $form['cassiopeia_config_footer']['3s_content'] = array(
    '#type' => "text_format",
    '#title' => 'Content',
    '#resizable' => TRUE,
    '#format' => 'full_html',
    "#default_value" => $_body['value'],
  );


  $_footer = variable_get('3s_copyright', array(
    'value' => '',
    'format' => 'full_html'
  ));

  $form['cassiopeia_config_footer']['3s_copyright'] = array(
    '#type' => "text_format",
    '#title' => 'Copyright',
    '#resizable' => TRUE,
    '#format' => 'full_html',
    "#default_value" => $_footer['value'],
  );


  $form['#submit'][] = 'cassiopeia_3s_config_settings_submit';

  return system_settings_form($form);

}


function cassiopeia_3s_config_settings_submit ($form, &$form_state) {

}


