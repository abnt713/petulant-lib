<?php

define('DATABASE_HOST', 'host');
define('DATABASE_NAME', 'name');
define('DATABASE_USER', 'user');
define('DATABASE_PASS', 'pass');


class DatabaseConnector{

    private static $instance;

    /**
     *
     * @return PDO
     */
    public static function getInstance(){
        if(self::$instance == null){
            self::$instance = new PDO('mysql:host=' . DATABASE_HOST . ';dbname=' . DATABASE_NAME, DATABASE_USER, DATABASE_PASS);
        }

        return self::$instance;
    }

}
