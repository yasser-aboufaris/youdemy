<?php
require_once '../../../classes/conn.php';
require_once '../../../classes/categories.php';


$categorie = new Categorie($conn);
$categorie->setName($_POST['name']);
$categorie->setDescription($_POST['description']);
$categorie->insert();


foreach(){
    
}