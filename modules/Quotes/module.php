<?php
// Learning Drupal Moduals =<3
function quotes_menu($may_cache){
	$items=array();
		//if($may_cache){
			$items[]=array(
				'path'=> 'admin/settings/favorite/quotes',
				'title'=> t("Manage Favorite Quotes"),
				'description' => t("Add more favorite quotes"),
				'callback' => 'drupal_get_form',
				'callback arguments' =>'quotes_settings',
				'access' => user_access('access administration pages')
			);
	//}

	return $items
}

function quotes_settings(){
	$form["quotes_manage"]= array(
			'$type'=>'textfield',
			'$title' => t("Add a new quote"),
			'$tree'=>TRUE
	);
	$form["quotes_manage"]["add"][0]= array(
			'$type'=>'textfield',
			'$title' => t("Enter a quote"),
			'$description' => t("Qualified quotes are only thoes that are your favoriute")
	);
	$form["quotes_manage"]["add"][1]= array(
			'$type'=>'textfield',
			'$title' => t("Author"),
			
	);
	$form["$submit"]=array("quotes_get_form" => array());

	return system_settings_form($form);
}

function quotes_get_form($form_id, $form_values){
	drupal_set_message(t("Submitted!!"));

}


?>