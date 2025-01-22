<?php
require_once '../../../classes/conn.php';
require_once '../../../classes/categories.php';


$tag = new Tag($conn);
$categorie->setName($_POST['name']);
$categorie->insert();


foreach(){
    
}