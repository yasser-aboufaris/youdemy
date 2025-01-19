<?php
require_once 'User.php';

class Client extends User {
    public function __construct($pdo) {
        parent::__construct($pdo);
    }

    public static function readClients($pdo){
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

    


}
