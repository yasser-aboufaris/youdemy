<?php
include "../../classes/conn.php";
include "../../classes/courses.php";
$id_course = $_GET['id_course'];
$id_user = $SESSION['id_user'];

$course = new Course($conn);
$course->setId($id_course);
$course->signCourse($id_user);
header("Location: ../../view/student/courses.php");