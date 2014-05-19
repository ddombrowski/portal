<?php

class Model_Attribute extends Orm\Model
{
	protected static $_table_name = 'attributes';
	protected static $_properties = array(
		'id',
		'portal_id' => array(
			'datatype' => 'int',
			'label' => "Portal ID",
			'validation' => array('required'),
			'form' => array('type' => 'text')
		),
		'parent' => array(
			'datatype' => 'int',
			'label' => "Parent Attribute",
			'validation' => array('required'),
			'form' => array('type' => 'text'),
		),
		'name' => array(
			'datatype' => 'varchar',
			'label' => "Name",
			'validation' => array('required', 'max_length' => array(50)),
			'form' => array('type' => 'text')
		),
		'group' => array(
			'datatype' => 'int',
			'label' => "Group that can have this attribute",
			'validation' => array('required'),
			'form' => array('type' => 'text')
		),
		'can_comment' => array(
			'datatype' => 'int',
			'label' => "Allow comments",
			'validation' => array('required'),
			'form' => array('type' => 'text'),
			'default' => 0
		),
		'can_owner_comment' => array(
			'datatype' => 'int',
			'label' => "Can the assignee comment?",
			'validation' => array('required'),
			'form' => array('type' => 'text'),
			'default' => 0
		),
		'group_can_comment' => array(
			'datatype' => 'int',
			'label' => "This group and groups that inherit it can comment",
			'validation' => array('required'),
			'form' => array('type' => 'text')
		),
		'group_visibility' => array(
			'datatype' => 'int',
			'label' => "This group and groups that inherit can view this attribute",
			'validation' => array('required'),
			'form' => array('type' => 'text')
		),
	);
	
	protected static $_has_many = array(
		'attribute_values' => array(
			'key_from' => 'id',
			'key_to' => 'attribute_id',
			'model_to' => 'Model_Attribute_Value'
		),
		'children' => array(
			'key_from' => 'id',
			'key_to' => 'parent',
			'model_to' => 'Model_Attribute'
		)
	);
	
	protected static $_belongs_to = array(
		'portal' => array(
			'key_from' => 'portal_id',
			'key_to' => 'id',
			'model_to' => 'Model_Portal'
		),
		'parent' => array(
			'key_from' => 'parent',
			'key_to' => 'id',
			'model_to' => 'Model_Attribute'
		)
	);
}

?>