<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
	'default' => array(
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
