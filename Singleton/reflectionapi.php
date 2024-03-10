<?php
require "singleton.php";
/*****
 * 
 * Reflection APIcaan ak singleton pattern and make it accessible to create new onjects
 * 
 * 
 */

use Singleton\ConnectDB;

class CheckSingleton {
    public $single;
    public $eager;
    public $reflection;
    public $instance2;
    public function __construct()
    {
        $this->reflection = new ReflectionClass('Singleton\ConnectDB');
        $constructor = $this->reflection->getConstructor();
        $constructor->setAccessible(false);
        $this->instance2 = $this->reflection->newInstanceWithoutConstructor();
        $this->single = ConnectDB::connect();

    }
}

$chk = new CheckSingleton();
print_r($chk);
