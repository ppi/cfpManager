<?php
$routes = array();
$routes['__default__'] = 'conference/index';
$routes['__404__'] = 'general/show404';

$routes['/myaccount'] = 'user/showaccount';