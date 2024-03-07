<?php
require "singleton.php";
require "EagerSingleton.php";

use Singleton\ConnectDB;
use Singleton\ConnectDBEager;

class CheckSingleton {
    public $single;
    public $eager;
    public function __construct()
    {
        $this->single = ConnectDB::connect();
        $this->eager = ConnectDBEager::connect();

    }
}

$chk = new CheckSingleton();
print_r($chk);
