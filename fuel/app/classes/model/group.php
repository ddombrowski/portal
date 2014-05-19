<?php

class Model_Group extends Orm\Model
{
	protected static $_table_name = 'groups';
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
			'label' => "Parent Group",
			'validation' => array('required'),
			'form' => array('type' => 'text')
		),
		'is_admin' => array(
			'datatype' => 'int',
			'label' => "Is this the portal admin group? Or should this group be able to edit content in this portal?",
			'validation' => array('required'),
			'form' => array('type' => 'text'),
		),
	);
	
	protected static $_many_many = array(
		'users' => array(
			'key_from' => 'id',
			'key_through_from' => 'group_id',
			'table_through' => 'users_groups',
			'key_through_to' => 'user_id',
			'key_to' => 'id',
			'model_to' => 'Model_User',
			'cascade_save' => true,
			'cascade_delete' => false
		)
	);
	
	protected static $_has_many = array(
		'children' => array(
			'key_from' => 'id',
			'key_to' => 'parent',
			'model_to' => 'Model_Group'
		),
		'attributes' => array(
			'key_from' => 'id',
			'key_to' => 'group_id',
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
			'model_to' => 'Model_Group'
		)
	);
}

?>