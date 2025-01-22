<?php
class User {
    protected $pdo;
    protected $id_user;
    protected $user_name;
    protected $email;
    protected $password;
    protected $role;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }


    ///////////////////////
    public function setSession(){
        $_SESSION['id_user'] = $this->id_user;
        $_SESSION['role'] = $this->role;
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

