<?php

$id_categorie=$_GET['id'];
require_once '../../../classes/conn.php';
require_once '../../../classes/categories.php';

$categorie = new Categorie($conn);
$categorie->setId($id_categorie);
$categorie->delete();
