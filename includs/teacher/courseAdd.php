<?php
session_start(); 

// if (!isset($_SESSION['id_user'])) {
//     die('Access denied. Please log in.'); 

// $id_teacher = $_SESSION['id_user'];

require_once '../../classes/conn.php';
require_once '../../classes/tags.php';
require_once '../../classes/courses.php';


if (empty($_POST['title']) || empty($_POST['category']) || empty($_POST['description']) || 
    empty($_POST['content']) || empty($_POST['type']) || empty($_POST['tags'])) {
    die('All fields are required.'); 
}


$title = htmlspecialchars(trim($_POST['title']));
$category = htmlspecialchars(trim($_POST['category']));
$description = htmlspecialchars(trim($_POST['description']));
$content = htmlspecialchars(trim($_POST['content']));
$type = htmlspecialchars(trim($_POST['type']));
$tags = array_map('htmlspecialchars', $_POST['tags']); 


$course = new Course($conn);
$course->setTitle($title);
$course->setCategorie($category);
$course->setDescription($description);
$course->setContent($content);
$course->setType($type);
// $course->setTeacher($id_teacher);
$course->setTags($tags);

$course->insert();
