<?php

require_once dirname(__FILE__).'/../config.php';

class DatabaseConnector{
    
    private static $instance;
    
    /**
     * 
     * @return PDO
     */
    public static function getInstance(){
        if(self::$instance == null){
            self::$instance = new PDO('mysql:host=' . DATABASE_HOST . ';dbname=' . DATABASE_NAME, DATABASE_USER, DATABASE_PASSWORD);
        }
        
        return self::$instance;
    }
    
}

