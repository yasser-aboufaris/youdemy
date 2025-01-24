<?php
include "../../classes/conn.php";
include "../../classes/courses.php";
include "../../classes/tags.php";

// Retrieve course details
$id_course = $_GET['id_course'];

$courses = Course::readCoursesById($conn, $id_course);
if (empty($courses)) {
    die("Course not found");
}

$course = $courses[0]; // First course in the array

// Retrieve tags for this course using Tag class method
$courseTags = Tag::readTagsByCourse($conn, $id_course);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($course->getTitle()); ?> - Course Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-md p-6 flex flex-col">
            <div class="mb-6">
                <h2 class="text-xl font-bold mb-4">Course Information</h2>
                <div class="space-y-2">
                    <p><strong>Category:</strong> <?php echo htmlspecialchars($course->getCategorie()); ?></p>
                    <p><strong>Teacher:</strong> <?php echo htmlspecialchars($course->getTeacher()); ?></p>
                    <p><strong>Type:</strong> <?php echo htmlspecialchars($course->getType()); ?></p>
                </div>
            </div>

            <!-- Course Tags -->
            <div class="mt-6 mb-6">
                <h3 class="text-lg font-semibold mb-4">Course Tags</h3>
                <div class="flex flex-wrap gap-2">
                    <?php foreach ($courseTags as $tag): ?>
                        <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">
                            <?php echo htmlspecialchars($tag->getName()); ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Signup Button -->
            <div class="mt-auto w-full">
                <a href="../../includs/student/userSignCourse.php?id_course=<?php echo $id_course; ?>" class="w-full block text-center bg-gradient-to-r from-blue-600 to-blue-800 text-white py-3 px-6 rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition duration-300 ease-in-out">
                    <i class="fas fa-book-open mr-2"></i>Get Course
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-y-auto">
            <!-- Course Header -->
            <div class="bg-blue-600 text-white p-8">
                <div class="max-w-4xl mx-auto">
                    <h1 class="text-3xl font-bold mb-4"><?php echo htmlspecialchars($course->getTitle()); ?></h1>
                    <p class="text-blue-100 text-xl"><?php echo htmlspecialchars($course->getDescription()); ?></p>
                </div>
            </div>

            <!-- Course Content -->
            <div class="max-w-4xl mx-auto p-8">
                <div class="bg-white shadow-lg rounded-lg p-8">
                    <h2 class="text-2xl font-semibold mb-6 text-gray-800">Course Content</h2>
                    <div class="text-gray-600 leading-relaxed prose max-w-none">
                        <?php echo $course->getContent(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>