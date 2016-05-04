<?php
// Learning Drupal Moduals =<3
/**
* Implements Hook_permissions()
*/
function quotes_permission(){
	return array(
		'access quotes'=> array(
			'title' => t('Access quotes'),
			'description' => t('Access form for quotes'),
		),
	);
}

function quotes_menu(){
	$items=array();
		$items['quotes']=array(
			'title'=> t("Quotes"),
			'type'=>MENU_NORMAL_ITEM,
			'access arguments' => array('access quotes'),
			'page callback' =>'drupal_get_form',
			'callback arguments' =>array('quotes_form'),
			'description' => t("Add more favorite quotes"),
			
			
			);

	return $items;
}

/**
* Quotes Form
*/

function quotes_form($form, &$form_state){
	$form["Quote"]= array(
			'#type'=>'textfield',
			'#title' => t("Enter a quote"),
			'#description' => t("Qualified quotes are only those that are your favorite"),
	);
	$form["author"]= array(
			'#type'=>'textfield',
			'#title' => t("Author"),
			
	);
	$form["submit"]=array(
		'#type'=>'submit',
		'#value'=>t('Add Quote'),
	);

	return $form;
}

function quotes_form_submit($form, &$form_state){
	drupal_set_message(t("Submitted!!"));

}

?>