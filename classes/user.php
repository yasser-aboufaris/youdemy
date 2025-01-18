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

    public static function readUsers($pdo){
        $qry="select * from users where id_role !=1";
        $stmt=$pdo->prepare($qry);
        $stmt->execute();
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $users=[];
        foreach($data as $row){
            $object = new self($pdo);
            $object->setIdUser($row['id_user']);
            $object->setEmail($row['user_email']);
            $object->setUserName($row['user_name']);
            array_push($users,$object);
        }
        return $users;
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

