<?php
/**
* Implements Hook_permissions()
*/
function form_example_permission(){
	return array(
		'submit form_example'=> array(
			'title' => t('Submit form_example'),
			'description' => t('Submit the form_example form'),
		),
		'access form example submissions'=> array(
			'title' => t('Access form example submissions'),
			'description' => t('Access form the example submissions'),
		),
	);
}

/**
* Implements Hook_menu()
*/
function form_example_menu(){
	$items = array();
	$items['form-example'] = array(
		'title' => 'My example form',
		'type'=> MENU_NORMAL_ITEM,
		'access arguments' => array('access form_example'),
		'page callback' => 'drupal_get_form',
		'page arguments' => array('form_example_form'),
	);

	$items['form-submissions'] = array(
		'title' => 'My example Submission',
		'type'=> MENU_NORMAL_ITEM,
		'access arguments' => array('access form_example submissions'),
		'page callback' => 'form_example_submissions',
			);
	return $items;
}
/**
* Example form
*/
function form_example_form($form, &$form_state){
	$form['mynumber'] = array(
		'#type' => 'textfield',
		'#title' => t('My Number'),
		'#size' => 10,
		'#maxLength' => 10,
		'#required' => TRUE,
		'#description' => t('Please enter a valid number'),
	);
	$form['title'] = array(
		'#type' => 'textfield',
		'#title'=> t('Author'),
		'#size' => 10,
		'#maxLength' => 10,
		'#required'=> TRUE,
		
	);
	$form['mytextfield'] = array(
		'#title'=> t('My Textarea'),
		'#type' => 'textarea',
		'#description' => t('Enter Some text'),
		'#required' => TRUE,
	);
	$form['sumbit'] = array(
		'#type'=>'submit',
		'#value' => t('Add item'),
	);	
	return $form;
}


/**
*Submit handler for the form_example_form
*/

function form_example_form_submit($form, &$form_state){
	$fe_id = db_insert('form_example')
	->fields(array(
		'mynumber' => $form_state['values']['mynumber'],
		'title' => $form_state['values']['title'],
		'mytextfield' => $form_state['values']['mytextfield'],

	))
	->execute();

	drupal_set_message(t('Your form has been added.'));
}


/**
*View the form submissions
*/
function form_example_submissions(){
	$results= db_query('SELECT * FROM form_example');

	$header = array(t('ID'),t('My Number'),t('My Textfield'), t('My Text'));
	$rows = array();

	foreach($results AS $result){
		$rows[]=array(
			$result->fe_id,
			$result->mynumber,
			$result->title,
			$result->mytextfield,
		);
	}
return theme ('table', array('header'=>$header, 'rows'=>$rows));
}

/**
* Validation handler for the form_example_form.
*/

function form_example_form_validate($form, &$form_state){

//print('<pre>'.print_r($form_state['values'],1).'</pre>');die();
if(!is_numeric($form_state['values']['mynumber'])){
	form_set_error('mynumber', t('You must entar a valid number'));
	return FALSE;
	}
	return TRUE;
}

