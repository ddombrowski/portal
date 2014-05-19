<?php

class Model_Page extends Orm\Model
{
	protected static $_table_name = 'pages';
	protected static $_properties = array(
		'id',
		'portal_id' => array(
			'datatype' => 'int',
			'label' => "Parent Portal",
			'validation' => array('required'),
			'form' => array('type' => 'text')
		),
		'parent' => array(
			'datatype' => 'int',
			'label' => "Parent",
			'validation' => array('required'),
			'form' => array('type' => 'text')
		),
		'name' => array(
			'datatype' => 'varchar',
			'label' => "Page Name",
			'validation' => array('required', 'max_length' => array(255)),
			'form' => array('type' => 'text')
		),
		'uri' => array(
			'datatype' => 'varchar',
			'label' => "Page URI",
			'validation' => array('required', 'max_length' => array(255)),
			'form' => array('type' => 'text')
		),
		'content' => array(
			'datatype' => 'longtext',
			'label' => "Content",
			'form' => array('type' => 'textarea')
		),
	);
	
	protected static $_belongs_to = array(
		'portal' => array(
			'key_from' => 'portal_id',
			'key_to' => 'id',
			'model_to' => 'Model_Portal'
		)
	);
	
	protected static $_has_many = array(
		'children' => array(
			'key_from' => 'id',
			'key_to' => 'parent',
			'model_to' => 'Model_Page'
		)
	);
}

?>