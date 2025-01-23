<?php
include "../../classes/conn.php";
include "../../classes/courses.php";
include "../../classes/tags.php";

$id_course = 3;

$courses = Course::readCoursesById($pdo, $id_course);
if (empty($courses)) {
    die("Course not found");
}

$course = $courses[0];
$courseTags = Tag::readTagsByCourse($pdo, $id_course);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($course->getTitle()); ?> - YouTube Course</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-md p-6">
            <div class="mb-6">
                <h2 class="text-xl font-bold mb-4">Course Information</h2>
                <div class="space-y-2">
                    <p><strong>Category:</strong> <?php echo htmlspecialchars($course->getCategorie()); ?></p>
                    <p><strong>Teacher:</strong> <?php echo htmlspecialchars($course->getTeacher()); ?></p>
                    <p><strong>Type:</strong> <?php echo htmlspecialchars($course->getType()); ?></p>
                </div>
            </div>

            <!-- Course Tags -->
            <div class="mt-6">
                <h3 class="text-lg font-semibold mb-4">Course Tags</h3>
                <div class="flex flex-wrap gap-2">
                    <?php foreach ($courseTags as $tag): ?>
                        <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">
                            <?php echo htmlspecialchars($tag->getName()); ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-y-auto">
            <!-- Course Header -->
            <div class="bg-red-600 text-white p-8">
                <div class="max-w-4xl mx-auto">
                    <h1 class="text-3xl font-bold mb-4"><?php echo htmlspecialchars($course->getTitle()); ?></h1>
                    <p class="text-red-100 text-xl"><?php echo htmlspecialchars($course->getDescription()); ?></p>
                </div>
            </div>

            <!-- YouTube Video -->
            <div class="max-w-4xl mx-auto p-8">
                <div class="bg-white shadow-lg rounded-lg p-8">
                    <div class="aspect-w-16 aspect-h-9 relative w-full">
                        <?php echo $course->getContent(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>