<?php

namespace Singleton;
/*****
*
* Singleton Pattern
* Only One object needs to be created throughout the project
* Like DB connection
* 
*
**/
class ConnectDB {
    private $dbConnection;
    private static $host;
    private static $username;
    private static $password;
    private static $db;
    private static $connect;

    private function __construct()
    {
        self::$host = 'localhost';
        self::$username = 'root';
        self::$password = 'abc';
        self::$db = 'abc';
        $this->dbConnection = mysqli_connect(self::$host, self::$username, self::$password, self::$db) or Die('Unable to connect DB');
    }

    public static function connect() {

        if (is_null(self::$connect)) {
            self::$connect = new self();
        }    
        return self::$connect;
    }
}

$db = ConnectDB::connect();
print_r($db);

