<?php
/**
 * Created by PhpStorm.
 * User: Vytas
 * Date: 2018-09-16
 * Time: 4:00 PM
 */

//available to all extending classes
class BaseObject {

    public static $user_vars = array();

    public function __set($name, $value){
        self::$user_vars[$name] = $value;
    }

    public function __get($name){
        return (isset(self::$user_vars[$name])) ? self::$user_vars[$name] : null;
    }

}