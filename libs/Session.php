<?php

/**
 * Description of Session
 *
 * @author Ritesh Rijal(riteshrijal@yahoo.com) 
 */
class Session {

    /**
     * Check the existance of the session
     * @param type $name -> name of the session to check
     * @return type -> return the existance of session
     */
    public static function exists($name) {
        return (isset($_SESSION[$name])) ? true : false;
    }
    
    /**
     * @desc: put the value to the session
     * @param type $name
     * @param type $value
     * @return type
     */
    public static function put($name, $value) {
        return $_SESSION[$name] = $value;
    }
    
    /**
     * @Desc : Method to get the session value of a session name
     * @param type $name
     * @return the session value
     */
    public function get($name) {
        return $_SESSION[$name];
    }
    
    /**
     * @Des : delete a session
     * 
     * @param type $name
     */
    public function delete($name) {
        if (self::exists($name)) {
            unset($_SESSION[$name]);
        }
    }

    public static function flash($name, $string = '') {
        if (self::exists($name)) {
            $session = self::get($name);
            self::delete($name);
            return $session;
        } else {
            self::put($name, $string);
        }
    }
}

