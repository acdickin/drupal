<?php

/**
*Implements hook_schema()
*/

function quote_schema(){
	$schema=array();
	$schema['quotes']=array(
		'description' => 'Quote table',
		'fields' => array(
			'qid' => array(
				'description' => 'Primary Key',
				'type'=>'serial',
				'unsigned' => TRUE,
				'not null' => TRUE,
			),
			'quote' => array(
				'description' => 'Text of the quote',
				'type'=>'text',
				'unsigned' => TRUE,
				'not null' => TRUE,
			),
			'author' => array(
				'description' => 'Author of the quote',
				'type'=>'varchar',
				'length' => 50,
				'not null' => TRUE,
				'default' => ''
			),
			'primary key' => array('qid'),
		),
	),
	$schema['quotes_rating']=array(
		'description' => 'Quote rating table',
		'fields' => array(
			'qrid' => array(
				'description' => 'Primary Key from quote table',
				'type'=>'int',
				'unsigned' => TRUE,
				'not null' => TRUE,
			),
			'qid' => array(
				'description' => 'Primary Key from quotes table',
				'type'=>'serial',
				'unsigned' => TRUE,
				'not null' => TRUE,
			),
			'up' => array(
				'description' => 'Count number of up votes',
				'type'=>'int',
				'unsigned' => TRUE,
				'not null' => TRUE,
			),
			'down' => array(
				'description' => 'Count number of down votes',
				'type'=>'int',
				'unsigned' => TRUE,
				'not null' => TRUE,
			),
			'foreign keys' => array(
    	  	'node_revision' => array(
      	 	 'table' => 'node_revision',
       	 	'columns' => array('vid' => 'vid'),
      ),
    	'primary key'=> array('qrid')
    );
}
?>
