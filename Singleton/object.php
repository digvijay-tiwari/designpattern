<?php
require "singleton.php";

use Singleton\ConnectDB;

class CheckSingleton {
    public $single;
    public function __construct()
    {
        $this->single = ConnectDB::connect();
    }
}

$chk = new CheckSingleton();
print_r($chk);
