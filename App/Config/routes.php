<?php
$routes = array();
$routes['__default__'] = 'conference/index';
$routes['__404__'] = 'general/show404';

$routes['/account'] = 'user/showaccount';
$routes['/account/view/(:any)'] = 'user/showaccount/username/$1';
$routes['/account/edit'] = 'user/editaccount';
$routes['/account/edit/password'] = 'user/editpassword';