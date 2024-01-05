<?php

function theme_cassiopeia_admin_administrator_page_block_load_all($variables){
  drupal_add_tabledrag('cassiopeia-admin-block', 'order', 'sibling', 'block-weight');
  $form = $variables['form'];
  $header = array('Tên khối', 'Icon', 'Vị trí', 'Xóa', 'Sửa', 'Biểu tượng');
  $rows = array();
  foreach (element_children($form['blocks']) as $key) {
    $row = array();
    $row[] = drupal_render($form['blocks'][$key]['name']);
    $row[] = drupal_render($form['blocks'][$key]['icon']);
    $row[] = drupal_render($form['blocks'][$key]['position']);
    $row[] = drupal_render($form['blocks'][$key]['delete']);
    $row[] = drupal_render($form['blocks'][$key]['edit']);
    $row[] = drupal_render($form['blocks'][$key]['items']);
    $rows[] = array('data' => $row, 'class'=> array('draggable'));
  }
  $output = theme('table', array('header' => $header, 'rows' => $rows, 'attributes' => array('id' => 'cassiopeia-admin-block')));
  $output .= drupal_render_children($form);
  return  '<div class="box box-primary"> <div class="box-body">' . $output . '</div></div>';
}

function theme_cassiopeia_admin_administrator_page_block_load_items($variables){
  drupal_add_tabledrag('cassiopeia-admin-block-items', 'order', 'sibling', 'items-weight');
  $form = $variables['form'];
  $header = array('Tên biểu tượng', 'Đường dẫn', 'Biểu tượng', 'Vị trí', 'Xóa', 'Sửa');
  $rows = array();
  foreach (element_children($form['items']) as $key) {
    $row = array();
    $row[] = drupal_render($form['items'][$key]['name']);
    $row[] = drupal_render($form['items'][$key]['link']);
    $row[] = drupal_render($form['items'][$key]['icon']);
    $row[] = drupal_render($form['items'][$key]['position']);
    $row[] = drupal_render($form['items'][$key]['delete']);
    $row[] = drupal_render($form['items'][$key]['edit']);
    $rows[] = array('data' => $row, 'class'=> array('draggable')); 
  }
  $output = theme('table', array('header' => $header, 'rows' => $rows, 'attributes' => array('id' => 'cassiopeia-admin-block-items')));
  $output .= drupal_render_children($form);
  return $output;    
}

function theme_cassiopeia_admin_administrator_icon($variables){
  $icon = $variables['icon'];
  return '<i class="fa '.$icon.'"></i>';
}

function theme_cassiopeia_admin_get_menu_left($variables){
  $items = $variables['items'];
  foreach($items as $key => $item){
      if(empty($item['#below'])) unset($items[$key]);
  }
  return cassiopeia_admin_build_menu($items);
}

function theme_cassiopeia_admin_get_menu_left_cassiopeia_admin_theme($variables){
  $items = $variables['items'];
  foreach($items as $key => $item){
    if(empty($item['#below'])) unset($items[$key]);
  }
  return cassiopeia_admin_build_menu_cassiopeia_admin_theme($items);
}

function cassiopeia_admin_build_menu_cassiopeia_admin_theme($items, $class = 'menu'){
  $out = '';
  foreach($items as $item){
    $out .= cassiopeia_admin_build_menu_link($item, '');
  }
  return $out;
}

function cassiopeia_admin_build_menu($items, $class = 'menu'){
  $out = '<ul class="treeview-menu '.$class.'">';
  foreach($items as $item){
      $out .= cassiopeia_admin_build_menu_link($item, '');
  }
  $out .= '</ul>';
  return $out;
}

function cassiopeia_admin_build_menu_link($element) {
  $sub_menu = '';
  if (!empty($element['#below']) && count($element['#below'])) {
    $sub_menu = cassiopeia_admin_build_menu($element['#below']);
    $element['#attributes']['class'][] = 'treeview';
    $element['#title'] .= '<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></span></i>';
  }else{

  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>";
}