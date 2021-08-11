<?php
//database.php

class Database {

    //facem sa fie totul static

    private static $_host = 'localhost';
    private static $_username = 'linndows_user';
    private static $_password = '???';
    private static $_database = 'linndows_learn';

    //initial conexiunea nu exista
    private static $connection = null;

    public function __construct()
    {
        //folosind "static", nu va fi nevoie sa cream o noua instanta
        die("Error");
    }

    //functia prin care ne conectam
    public static function connect (){ 
        
        //daca inca nu s a realizat conexiunea
        if(self::$connection == null) {
            //realizam conexiunea, urmarind si eroriel
            try {

                $dsn = 'mysql:host='.self::$_host.';dbname='.self::$_database.'';
                // ne conectam
                self::$connection = new PDO($dsn,self::$_username,self::$_password);

            }catch (PDOException $e) {
                //incheiem tot daca s a intamplat ceva gresit
                die($e->getMessage()); //mesajul erorii
            }
        }
        //daca totul a mers bine, returnam conexiunea
        return self::$connection;
    }

    //functia prin care ne deconectam
    public static function disconnect () {
        self::$connection = null; 
    }

}

?>