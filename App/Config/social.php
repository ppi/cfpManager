<?php

$social = array(

	"base_url" => "http://cfpmanager.com/user/socialendpoint",

	"providers" => array (
		// openid providers
		"Github" => array (
			"enabled" => true,
			"keys"    => array ( "id" => "7c893bfa88514844f454", "secret" => "477c087264b36b95903eca238192820b9bd55d4f" ),
			'scope'   => ''
		)
	),
	// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
	"debug_mode" => false,
	"debug_file" => '',
);