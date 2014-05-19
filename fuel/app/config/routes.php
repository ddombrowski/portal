<?php

function createPortalRoutes($parent, $prefix, $array)
{
	$portals = DB::query("SELECT `uri`, `id` FROM `portals` WHERE `parent` = ".$parent, DB::SELECT)->execute();
	foreach($portals as $portal)
	{	
		//define portal indexes first
		$array[$prefix.$portal['uri']] = array('portal/index', 'name' => $portal['uri']);
		$array = createPortalRoutes($portal['id'], $prefix.$portal['uri'].'/', $array);
		
		//define portal admin uris
		$array[$prefix.$portal['uri'].'/admin'] = array('portal/admin', 'name' => $portal['uri'].'_admin');
		
		//define portal actions after
		$array[$prefix.$portal['uri'].'/(:alpha)'] = 'portal/page/$1';
		$array[$prefix.$portal['uri'].'/process/(:any)'] = 'portal/process/$1';
	}
	
	return $array;
}

$routeArray = array();

$routeArray['_root_'] = 'portal/index';	  // The default route
$routeArray['_404_'] = 'portal/404';	// The main 404 route

//build portal routes
$routeArray['login'] = 'auth/login';
$routeArray = createPortalRoutes(0, "", $routeArray);
$routeArray['(:alpha)'] = 'portal/page/$1';	// catch all

return $routeArray;

?>