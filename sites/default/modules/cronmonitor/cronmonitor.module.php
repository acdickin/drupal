<?php

/**
* Implements hooks_permission(),
*/
function cronmonitor_permission(){
return array(
	'administer cronmonitor'=> array(
		'title'=>t('Administer Cron Monitor'),
		'description'=> t('Preform administration tasks for Cron Monitor'),
		),
	);
}


/**
* Implements hooks_menu(),
*/
function cronmonitor_menu(){	
	$items['admin/config/cronmonitor']=array(
		'title' => 'Cron Monitor Settings',
		'type'=> MENU_NORMAL_ITEM,
		'page callback' => 'drupal_get_form',
		'page arguments'=> array('cronmonititor_admin_form'),
		'access argument' => array('administer cronmonitor'),
		);
	return $items;
}

/**
* Admin from for Cron Monitor
*/
function cronmonitor_admin_form($form,&$form_state){
$form['cronmonitor_enable'] = array(
	'#type' =>'checkbox',
	'#title' => t('Enable Cron Monitor.'),
	'#default_value'=> variable_get('cronmonitor_enable',0),
	);
$form['cronmonitor_emailtext']=array
	'#title'=>t('Text to send with Cron Monitor Emails'),
	'#type' => 'textarea',
	'#description'=> t('Enter text to send with cron monitor email'),
	'#default_value'=> variable_get('cronmonitor_email_text',''),
	
	);

return system_settings_form($form);
}