<?php

class Auth{
    public static $user = 'lu1$';
    public static $pass = 'r0nd0n';

    public static function authenticate(){
        if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) 
            || ($_SERVER['PHP_AUTH_USER'] != self::$user) 
            || ($_SERVER['PHP_AUTH_PW'] != self::$pass)) { 
            header('HTTP/1.1 401 Unauthorized'); 
            header('WWW-Authenticate: Basic realm="Password For Blog"'); 
        exit("Access Denied: Username and password required."); 
        } 
    }
}