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
   // public $single;
    //public $eager;
    public $reflection;
    public $instance2;
    public function __construct()
    {
        $this->single = ConnectDB::connect();

        $this->reflection = new ReflectionClass('Singleton\ConnectDB');
        $constructor = $this->reflection->getConstructor();
        $constructor->setAccessible(true);
        $this->instance2 = $this->reflection->newInstanceWithoutConstructor();


        echo "Singleton Instance: " . spl_object_id($this->single) . "\n";
        echo "Broken Singleton Instance: " . spl_object_id($this->instance2) . "\n";

    }
}

$chk = new CheckSingleton();
