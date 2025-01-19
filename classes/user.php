<?php
class User {
    protected $pdo;
    private $id_user;
    private $user_name;
    private $email;
    private $password;
    private $role;

    public function __construct($pdo, $email = null, $password = null) {
        $this->pdo = $pdo;
        $this->email = $email;
        $this->password = $password;
    }


    ///////////////////////
    public function setSession(){

    }


    // Getters and Setters
    public function getIdUser() {
        return $this->id_user;
    }

    public function setIdUser($id_user) {
        $this->id_user = $id_user;
    }

    public function setUserName($name){
        $this->user_name=$name;
    }
    public function getUserName() {
        return $this->user_name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }
}

