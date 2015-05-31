<?php

/**
 * Description of token
 *
 * @author Ritesh Rijal(riteshrijal@yahoo.com)
 */
class Token {

    public static function generate() {
        return Session::put(Config::get('session/token_name'), md5(uniqid()));
    }

    public static function check($token) {
        $tokenName = Config::get('session/token_name');
        if (Session::exists($tokenName) && $token === Session::get($tokenName)) {
            return true;
        }
        return false;
    }

}
