<?php

/*
 * Escape characters when fetching from database
 * return $string
 *
 */

function escape($string) {
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}


/**
 * Desc :  Method to generate a random string
 * @param type $length
 * @return type
 */
function random($length) {
    $char = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $random = "";
    for ($i = 0; $i < $length; $i++) {
        $rand = rand(0, strlen($char) - 1);
        $random .= substr($char, $rand, 1);
    }
    return $random;
}
