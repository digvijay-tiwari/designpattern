<?php
namespace BuilderPattern;

require_once "./Users.php";
require "Interfaces/userBuilderInterface.php";

use BuilderPattern\Users;
use BuilderPattern\Interfaces\IUsersBuilder;

class UsersBuilder implements IUsersBuilder {
    private $userId;
    private $username;
    private $userEmail;

    public function createUserId(string $userId): IUsersBuilder
    {
        $this->userId = $userId;
        return $this;
    }

    public function createUserName(string $username): IUsersBuilder
    {
        $this->username = $username;
        return $this;
    }
    public function createEmail(string $userEmail): IUsersBuilder
    {
        $this->userEmail = $userEmail;
        return $this;
    }

    public function build(): Users
    {
        return new Users($this->userId, $this->username, $this->userEmail);
    }
}
