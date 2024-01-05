<?php

function cassiopeia_admin_contact_page_callback () {
	$query = db_select('cassiopeia_contact', 'cassiopeia_contact')
		->fields('cassiopeia_contact')
		->execute()
		->fetchAll();

	$per_page = 10;
	$current_page = pager_default_initialize(count($query), $per_page);
	$chunks = array_chunk($query, $per_page, TRUE);
	$pagination = theme('pager', ['quantity', count($query)]);
	$data = $chunks[$current_page] ?? [];

	return _cassiopeia_render_theme("module","cassiopeia_contact","templates/admin/contact.tpl.php",
		array(
			'items'=>$data,
			'pagination' => $pagination)
	);
}

function cassiopeia_delete_contact_callback() {
	drupal_set_message(t('Delete successfully'));
	return drupal_goto($GLOBALS['base_url'] . '/admin/cassiopeia/contact');
}
