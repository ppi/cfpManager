<?php
$routes = array();

$routes['__default__'] = 'home/index';
$routes['__404__'] = 'general/show404';

$routes['/my/talks'] = 'talk/my';

$routes['/account']               = 'user/showaccount';
$routes['/account/view/(:any)']   = 'user/showaccount/username/$1';
$routes['/account/edit']          = 'user/editaccount';
$routes['/account/edit/password'] = 'user/editpassword';

$routes['/manage/users/create']        = 'manage/createuser';
$routes['/manage/users/edit/(:num)']   = 'manage/edituser/$1';
$routes['/manage/users/view/(:num)']   = 'manage/viewuser/$1';
$routes['/manage/users/delete/(:num)'] = 'manage/deleteuser/$1';

$routes['/manage/talks/create']        = 'manage/createtalk';
$routes['/manage/talks/edit/(:num)']   = 'manage/edittalk/$1';
$routes['/manage/talks/view/(:num)']   = 'manage/viewtalk/$1';
$routes['/manage/talks/delete/(:num)'] = 'manage/deletetalk/$1';

$routes['/manage/content/create']        = 'manage/createcontent';
$routes['/manage/content/edit/(:num)']   = 'manage/editcontent/$1';
$routes['/manage/content/view/(:num)']   = 'manage/viewcontent/$1';
$routes['/manage/content/delete/(:num)'] = 'manage/deletecontent/$1';