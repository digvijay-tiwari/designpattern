<?php
namespace BuilderPattern\Interfaces;

use BuilderPattern\Users;


interface IUsersBuilder {
    public function createUserId(string $userId) :self;
    public function createUserName(string $username) :self;
    public function createEmail(string $userEmail) :self;
    public function build() :Users;
}