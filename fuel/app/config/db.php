<?php
/**
 * Use this file to override global defaults.
 *
 * See the individual environment DB configs for specific config information.
 */

return array(

	'development' => array(
		'type' => 'mysql',
		'connection' => array(
			'hostname' => 'localhost',
			'database' => 'portalcms',
			'username' => 'portalcms_user',
			'password' => 'X6wKB8Qa5695MuE3',
			'persisten' => false
		),
		'table_prefix' => '',
		'charset' => 'utf8',
		'caching' => false,
		'profiling' => false,
	),
	
	'production' => array(
		'type' => 'mysql',
		'connection' => array(
			'hostname' => 'localhost',
			'database' => 'portalcms',
			'username' => 'portalcms_user',
			'password' => 'X6wKB8Qa5695MuE3',
			'persisten' => false
		),
		'table_prefix' => '',
		'charset' => 'utf8',
		'caching' => false,
		'profiling' => false,
	),

);
