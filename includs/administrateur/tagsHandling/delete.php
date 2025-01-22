<?php

$id_tag=$_GET['id'];
require_once '../../../classes/conn.php';
require_once '../../../classes/tags.php';

$tag = new Tag($conn);
$tag->setId($id_tag);
$tag->delete();
