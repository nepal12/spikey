<?php

/**
 * Description of init
 *
 * @author Ritesh Rijal(riteshrijal@yahoo.com) 
 */



session_start();

define('URL', 'http://localhost/spikey/');

// Setting up variables
$GLOBALS['config'] = array(
	'mysql'	=> array(
		'host'		=> '127.0.0.1',
		'username'	=> 'root',
		'password'	=> '',
		'db'		=> 'spankey'
	),
	'remember'	=> array(
		'cookie_name'	=> 'hash',
		'cookie_expiry'	=> 604800
	),
	'session'	=> array(
		'session_name'	=> 'user',
		'token_name'	=> 'token'
	)
);


