<?php
/**
 * Fuel
 *
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.6
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2013 Fuel Development Team
 * @link       http://fuelphp.com
 */

return array(
	'driver' => 'Portalauth',
	'verify_multiple_logins' => false,
	'salt' => md5("AEKDBauth_config"),
	'iterations' => 10000,
);

?>