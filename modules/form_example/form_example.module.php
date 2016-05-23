<?php
/**
* Implements Hook_permissions()
*/
function form_example_permission(){
	return array(
		'submit form_example'=> array(
		'title'=>t('Submit form_example'),
		'description'=> t('Submit the form_example form'),
		),
	);
}

/**
* Implements Hook_menu()
*/
function form_example_menu(){
	$items = array();
	$items['form-example']= array(
		'title' =>'My example form'
		'type'=MENU_NORMAL_ITEM,
		'access arguments' => array('access form_example'),
		'page callback' => 'drupal_get_form'
		'page arguments' => array('form_exmaple_form')
	);
	return $items;
}
/**
* Example form
*/
function form_example_form($form, &$form_state){
	$form['myNumber']=array(
		'#type'=>'textfield',
		'#title'=>t('My number'),
		'#size' => 10,
		'#maxLength'=>10,
		'#required'=> TRUE,
		'#description' => t('Please enter a valid number')
	);
	$form['myTextfield'] =array(
		'#type'=> 'textfield',
		'#title'=>t('My Number'),
		'#size'=>10,
		'#maxLength'=>10,
		'#required'=>TRUE,
		'#description' => t('Please enter a valid number'),
	);
	$form['mytext']= array(
		'#title'=>t('My Textarea'),
		'#type' => 'textarea',
		'#description' => t('Enter Some text'),
		'#required'=>TRUE,
	);
	$form['sumbit']=array(
		'#type'=>'sumbit',
		'#value' => t('Add item'),
	);	
	return $form;
}

/**
* Validation handler for the form_example_form.
*/

function form_example_form_validate($form, &$form_state){

print('<pre>'.print_r($form_state['values'],1),'</pre>');die();
if(!is_numeric($form_state['values']['mynumber'])){
	form_set_error('mynumber', t('You must entar a valid number'));
	return FALSE;
	}
	return TRUE;
}

