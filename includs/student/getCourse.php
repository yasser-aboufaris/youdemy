<?php

<?php
session_start();
require_once '../../classes/courses.php';
require_once '../../classes/conn.php';

try {
    // Check if user is logged in
    if (!isset($_SESSION['user_id'])) {
        throw new Exception("You must be logged in to enroll in courses");
    }

    // Validate course ID
    if (empty($_GET['courseId'])) {
        throw new Exception("No course specified");
    }

    // Initialize course
    $course = new Course($conn);
    $course->setId($_GET['courseId']);

    // Attempt enrollment
    $course->enrollUser($_SESSION['user_id']);
    
    // Redirect on success
    $_SESSION['success'] = "Successfully enrolled in course!";
    header("Location: /course-details?id=" . $_POST['courseId']);
    exit();

} catch (Exception $e) {
    // Handle specific error cases
    $errorMessage = $e->getMessage();
    

    

}