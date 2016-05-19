<?php
/**
* @file
* myblock_module
*/

function myblock_block_info(){
	
	$blocks['myblock']=array(
	'info' => t("My custom block"),
	);
	return $blocks;

}

function myblock_block_view($delta = '') {
  // This example is adapted from node.module.
  $block = array();

  switch ($delta) {
    case 'myblock':
      $block['subject'] = t('This is my Custom Block');
      $block['content'] = "<h1><Strong> IT WORKED</Strong>. I'm so glad</h1>";
      break;
  }
  return $block;
}


?>