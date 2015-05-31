<?php

/**
 * Description of index
 *
 * @author Ritesh Rijal(riteshrijal@yahoo.com) 
 */
// Core Initialization
require_once 'core/init.php';

// Autolaoding

spl_autoload_register(function($class) {
    require_once 'libs/' . $class . '.php';
});

// This is the input sanitization function
require_once 'functions/functions.php';


// Load the Bootstrap!
$bootstrap = new Bootstrap();
$bootstrap->init();





