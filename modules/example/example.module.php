<?php
/**
*Implements hook_menu()
*/
function example_menu() {
  $items['page-html'] = array(
    'title' => 'My page with HTML-style function',
    'page callback' => 'example_html_page',
    'access callback' => TRUE,
  );

  $items['page-render'] = array(
    'title' => 'My page with render array function',
    'page callback' => 'example_ra_page',
    'access callback' => TRUE,
  );

  return $items;
}

/**
*Implements hook_theme().
*/
function example_theme($existing, $type, $theme,$path){
  return array(
    'example_function' => array(
      'variables'=> array ('text_one' => NULL, 'text_two' =>NULL)
    ),
    'example_template' =>array(
      'variables'=> array ('text_one' => NULL, 'text_two' =>NULL),
      'template'=> 'example_template'
      )
  );
}
/**
*Call back function using renderable array
*/
function example_html_page() {
 $text1 ="This is text one";
 return theme('example_function', array('text_one'=>$text1,'text_two'=>'Text two!!'));
 }

/**
*Callback function using renderable array
*/

function example_ra_page() {
  $output =  array(
    'first_para' => array(
      '#type' => 'markup',
      '#markup' => 'A paragraph about some stuff...',
    ),
    'second_para' => array(
      '#items' => array('first item', 'second item', 'third item'),
      '#theme' => 'item_list',
    ),
  );
  return $output;
}

function theme_example_function($variables){
  $output='<h2>'. $variables['text_one'].'</h2>';
  $output.='<p>'. $variables['txt_two'].'</p>';
  return $output;
}
