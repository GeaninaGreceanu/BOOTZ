<?php

namespace app\models;

class UserModel {
    public string $email, $firstName, $lastName, $country, $dateCreation;
    public function __construct($email, $firstName, $lastName, $country, $dateCreation)
    {
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->country = $country;
        $this->dateCreation = $dateCreation;

    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }
    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }
    public function setCountry($country) {
        $this->country = $country;
    }
}