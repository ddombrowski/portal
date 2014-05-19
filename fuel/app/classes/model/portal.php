<?php

class Model_Portal extends Orm\Model
{
	protected static $_table_name = 'portals';
	protected static $_properties = array(
		'id',
		'name' => array(
			'datatype' => 'varchar',
			'label' => "Portal Name",
			'validation' => array('required', 'max_length' => array(255)),
			'form' => array('type' => 'text')
		),
		'uri' => array(
			'datatype' => 'varchar',
			'label' => "Portal URI",
			'validation' => array('required', 'max_length' => array(255)),
			'form' => array('type' => 'text')
		),
		'parent' => array(
			'datatype' => 'int',
			'label' => "Portal Name",
			'validation' => array('required'),
			'form' => array('type' => 'text')
		),
		'created_at' => array(
			'datatype' => 'timestamp',
			'label' => "Portal Name",
			'form' => array('type' => false)
		),
	);
	
	protected static $_belongs_to = array(
		'parent' => array(
			'key_from' => 'parent',
			'key_to' => 'id',
			'model_to' => 'Model_Portal'
		)
	);
	
	protected static $_has_many = array(
		'groups' => array(
			'key_from' => 'id',
			'key_to' => 'portal_id',
			'model_to' => 'Model_Group'
		),
		'attributes' => array(
			'key_from' => 'id',
			'key_to' => 'portal_id',
			'model_to' => 'Model_Attribute'
		),
		'pages' => array(
			'key_from' => 'id',
			'key_to' => 'portal_id',
			'model_to' => 'Model_Page'
		),
		/*
		'processes' => array(
			'key_from' => 'id',
			'key_to' => 'portal_id',
			'model_to' => 'Model_Process'
		),
		*/
		'children' => array(
			'key_from' => 'id',
			'key_to' => 'parent',
			'model_to' => 'Model_Portal'
		)
	);
}

?>