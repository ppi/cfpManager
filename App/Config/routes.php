<?php
$routes = array();
$routes['__default__'] = 'conference/index';
$routes['__404__'] = 'general/show404';

$routes['/account'] = 'user/showaccount';
$routes['/account/edit'] = 'user/editaccount';
$routes['/account/edit/password'] = 'user/editpassword';