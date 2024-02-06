<?php
// class in PHP
class User {
    // private attributes of class `User`
    private $email;
    private $username;
    private $passkey;
    private $userType;
    private $isRemoved;
    private $createdAt;

    // we can also define `protected` & `public` attributes

    // access modifier for private properties of class `User`
    // this function return `email`
    public function getEmail(){
        return $this->email;
    }

    // this function store value to `email`
    public function setEmail($paramEmail){
        $this->email = $paramEmail;
    }

    public function getUsername(){
        return $this->username;
    }

    public function setUsername($paramUsername){
        $this->username = $paramUsername;
    }

    public function getPasskey(){
        return $this->passkey;
    }

    public function setPasskey($paramPasskey){
        $this->passkey = $paramPasskey;
    }

    public function getUserType(){
        return $this->userType;
    }

    public function setUserType($paramUserType){
        $this->userType = $paramUserType;
    }

    public function getIsRemoved(){
        return $this->isRemoved;
    }

    public function setIsRemoved($paramIsRemoved){
        $this->isRemoved = $paramIsRemoved;
    }

    public function getCreatedAt(){
        return $this->createdAt;
    }
    
    public function setCreatedAt($paramCreatedAt){
        $this->createdAt = $paramCreatedAt;
    }
}

// creating `User` class object
$user = new User();

// storing value to attribute
$user->setEmail("hello@gmaail.com");

// accessing value of attribute
echo $user->getEmail();