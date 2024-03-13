<?php
namespace BuilderPattern;

require_once "./UsersBuilder.php";
use BuilderPattern\UsersBuilder;


class CheckBuilder extends UsersBuilder {
    public $users;
    public function __construct()
    {
        $userBuilder = new UsersBuilder();
        $this->users = $userBuilder->createUserId('1234')
                    ->createUserName('Digvijay')
                    ->createEmail('digvijay@abc.com')
                    ->build();

    }
    public function getUserData() {
        return $this->users;
    }

}

$builder = new CheckBuilder();
$userData = $builder->getUserData();
print_r($userData);