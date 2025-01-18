<?php
require_once 'User.php';

class Client extends User {
    public function __construct($pdo) {
        parent::__construct($pdo);
    }

    


}
