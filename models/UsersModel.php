<?php

namespace app\models;

class UsersModel {
    public array $users = [];
    public function initUsers($users)
    {
        $this->users = $users;
    }

    public function addUser($user) {
        array_push($this->users, $user);
    }

    public function getUsers() {
        return $this->users;
    }
    
}