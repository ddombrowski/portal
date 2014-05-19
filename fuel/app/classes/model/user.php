<?php

class Model_User extends Orm\Model
{
	protected static $_table_name = 'users';
	protected static $_properties = array(
		'id',
		'first_name' => array(
			'datatype' => 'varchar',
			'label' => "First Name",
			'validation' => array('required', 'max_length' => array(255)),
			'form' => array('type' => 'text')
		),
		'last_name' => array(
			'datatype' => 'varchar',
			'label' => "Last Name",
			'validation' => array('required', 'max_length' => array(255)),
			'form' => array('type' => 'text')
		),
		'nickname' => array(
			'datatype' => 'varchar',
			'label' => "Nickname",
			'validation' => array('max_length' => array(255)),
			'form' => array('type' => 'text')
		),
		'email' => array(
			'datatype' => 'varchar',
			'label' => "Email",
			'validation' => array('required', 'valid_email'),
			'form' => array('type' => 'text')
		),
		'password' => array(
			'datatype' => 'varchar',
			'label' => "Password",
			'validation' => array('required', 'min_length' => array(7)),
			'form' => array('type' => 'password')
		),
		'email' => array(
			'datatype' => 'varchar',
			'label' => "Email",
			'validation' => array('required', 'valid_email'),
			'form' => array('type' => 'text')
		),
		'p_global_group' => array(
			'datatype' => 'int',
			'label' => "User Default Group",
			'form' => array('type' => 'false')
		),
		'created_at' => array(
			'data_type' => 'int',
			'label' => 'Created At',
			'form' => array('type' => false)
		),
		'updated_at' => array('data_type' => 'int', 'label' => 'Updated At')
	);
									
	protected static $_has_many = array(
		'attributes' => array(
			'model_to' => 'Model_Attribute'
		)
	);
	
	protected static $_many_many = array(
		'groups' => array(
			'key_from' => 'id',
			'key_through_from' => 'user_id',
			'table_through' => 'users_groups',
			'key_through_to' => 'group_id',
			'key_to' => 'id',
			'model_to' => 'Model_Group',
			'cascade_save' => true,
			'cascade_delete' => false
		)
	);
}

?>