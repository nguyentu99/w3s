<?php

function cassiopeia_dashboard_page_callback() {
	return _cassiopeia_render_theme("module", "cassiopeia", "templates/dashboard.tpl.php");
}

function cassiopeia_home_page_callback() {
	return '';
}

function cassiopeia_about_us_page_callback() {
	return _cassiopeia_render_theme("module", "cassiopeia", "templates/pages/about_us.tpl.php");
}

function cassiopeia_config_form() {
	$form = [];
	// Site inforemation
	$form['cassiopeia_config_site'] = [
		'#type' => "fieldset",
		'#title' => t('Website information'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	];

	$form['cassiopeia_config_site']['site_name'] = [
		'#type' => "textfield",
		'#title' => t('Website name'),
		"#default_value" => variable_get('site_name', ''),
	];

	$form['cassiopeia_config_site']['site_mail'] = [
		'#type' => "textfield",
		'#title' => t('Website Email'),
		"#default_value" => variable_get('site_mail', ''),
	];

	$form['cassiopeia_config_site']['hotline'] = [
		'#type' => "textfield",
		'#title' => t('Hotline'),
		"#default_value" => variable_get('hotline', ''),
	];

	$form['cassiopeia_config_social'] = [
		'#type' => "fieldset",
		'#title' => 'Social',
		'#collapsible' => TRUE,
		'#collapsed' => TRUE,
	];

	$form['cassiopeia_config_social']['youtobe_url'] = [
		'#type' => "textfield",
		"#title" => t('Youtobe ') . ' ' . t('link'),
		"#default_value" => variable_get('youtobe_url', ''),
	];

	$form['cassiopeia_config_social']['facebook_url'] = [
		'#type' => "textfield",
		"#title" => t('Facebook') . ' ' . t('link'),
		"#default_value" => variable_get('facebook_url', ''),
	];

	$form['cassiopeia_config_social']['twitter_url'] = [
		'#type' => "textfield",
		"#title" => t('Twitter ') . ' ' . t('link'),
		"#default_value" => variable_get('twitter_url', ''),
	];

	$form['cassiopeia_config_social']['google_plus_url'] = [
		'#type' => "textfield",
		"#title" => t('Google Plus ') . ' ' . t('link'),
		"#default_value" => variable_get('google_plus_url', ''),
	];

	$form['cassiopeia_config_social']['instagram_url'] = [
		'#type' => "textfield",
		"#title" => t('Instagram') . ' ' . t('link'),
		"#default_value" => variable_get('instagram_url', ''),
	];

	$form['cassiopeia_config_social']['pinterest_url'] = [
		'#type' => "textfield",
		"#title" => 'Instagram' . ' ' . t('link'),
		"#default_value" => variable_get('pinterest_url', ''),
	];


	$form['cassiopeia_config_social']['facebook_page'] = [
		'#type' => "textarea",
		'#title' => 'Facebook page',
		'#resizable' => TRUE,
		"#default_value" => variable_get('facebook_page', ''),
	];


	$form['cassiopeia_config_footer'] = [
		'#type' => "fieldset",
		'#title' => 'Footer',
		'#collapsible' => TRUE,
		'#collapsed' => TRUE,
	];

	$_footer = variable_get('footer', [
		'value' => '',
		'format' => 'full_html',
	]);
	$form['cassiopeia_config_footer']['footer'] = [
		'#type' => "text_format",
		'#title' => 'Footer',
		'#resizable' => TRUE,
		'#format' => 'full_html',
		"#default_value" => $_footer['value'],
	];


	$form['cassiopeia_config_copyright'] = [
		'#type' => "fieldset",
		'#title' => t('Copyright'),
		'#collapsible' => TRUE,
		'#collapsed' => TRUE,
	];

	$_copyright = variable_get('copyright', [
		'value' => '',
		'format' => 'full_html',
	]);
	$form['cassiopeia_config_copyright']['copyright'] = [
		'#type' => "text_format",
		'#title' => t('Copyright'),
		'#format' => 'full_html',
		"#default_value" => $_copyright['value'],
	];


	$form['cassiopeia_config_script'] = [
		'#type' => "fieldset",
		'#title' => 'Scripts',
		'#collapsible' => TRUE,
		'#collapsed' => TRUE,
	];

	$form['cassiopeia_config_script']['header_script'] = [
		'#type' => "textarea",
		'#title' => t('Page header'),
		'#resizable' => TRUE,
		"#default_value" => variable_get('header_script', ''),
	];
	$form['cassiopeia_config_script']['footer_script'] = [
		'#type' => "textarea",
		'#title' => t('Page footer'),
		'#resizable' => TRUE,
		"#default_value" => variable_get('footer_script', ''),
	];

	$form['#submit'][] = 'cassiopeia_config_settings_submit';

	return system_settings_form($form);
}

function cassiopeia_config_settings_submit($form, &$form_state) {

}

function cassiopeia_ajax_page() {
	global $user;
	global $base_url;
	$data = [];
	$data['message'] = '';
	$data['success'] = 0;
	if (isset($_POST['cmd'])) {
		switch ($_POST['cmd']) {

		}
	}
	return $data;
}



