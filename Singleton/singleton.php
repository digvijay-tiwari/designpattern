<?php

namespace Singleton;
/*****
*
* Singleton Pattern
* Only One object needs to be created throughout the project
*Required things:
*
* 1. Class should not be available for creating objects so private constructor is required
* 2. Insstantiation should be done only with the help of method or function that too a static
* 3. Created object should be private so that it should be prevented from modification from outside.   
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
        self::$password = 'jkljl';
        self::$db = 'kkljkjkjlk';
        $this->dbConnection = mysqli_connect(self::$host, self::$username, self::$password, self::$db) or Die('Unable to connect DB');
    }

    public static function connect() {

        if (is_null(self::$connect)) {
            self::$connect = new self();
        }    
        return self::$connect;
    }
}


