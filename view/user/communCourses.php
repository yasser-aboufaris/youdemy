<?php 
include "../../classes/conn.php";
include "../../classes/courses.php";

// Simple pagination setup
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$courses_per_page = 6;
$offset = ($current_page - 1) * $courses_per_page;

// Get total pages
$count_query = "SELECT COUNT(*) as total FROM courses";
$stmt = $conn->prepare($count_query);
$stmt->execute();
$total_courses = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
$total_pages = ceil($total_courses / $courses_per_page);

// Get courses for current page
$courses = Course::readCoursesByPagination($conn, $courses_per_page, $offset);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses - YouDem</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <section class="py-12">
        <div class="container mx-auto px-4">

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach ($courses as $course): ?>
        <div class="bg-white rounded-lg shadow-sm hover:shadow-lg transition-all duration-300 p-5 border border-gray-100 hover:border-blue-100">
            <div class="space-y-3">
                <h3 class="text-xl font-bold text-gray-900 hover:text-blue-600 transition-colors line-clamp-1">
                    <?php echo htmlspecialchars($course->getTitle()); ?>
                </h3>
                <p class="text-sm text-gray-600 line-clamp-3">
                    <?php echo htmlspecialchars($course->getDescription()); ?>
                </p>
                <div class="flex items-center text-xs text-gray-500 space-x-4">
                    <div class="flex items-center gap-1">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <?php echo htmlspecialchars($course->getTeacher()); ?>
                    </div>
                    <div class="flex items-center gap-1">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                        <?php echo htmlspecialchars($course->getCategorie()); ?>
                    </div>
                </div>
            </div>
            <div class="mt-4 flex justify-end">
                <?php if ($course->getType() === "video"): ?>
                    <a href="./courseReadVideo.php?id_course=<?php echo htmlspecialchars($course->getId()); ?>" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors text-sm font-semibold">
                        View Course
                    </a>
                <?php elseif ($course->getType() === "text"): ?>
                    <a href="courseReadText.php?id_course=<?php echo htmlspecialchars($course->getId()); ?>" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors text-sm font-semibold">
                        View Course
                    </a>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>

            <!-- Pagination -->
            <?php if ($total_pages > 1): ?>
                <div class="mt-12 flex justify-center">
                    <nav class="flex items-center space-x-2">
                        <?php if ($current_page > 1): ?>
                            <a href="?page=<?php echo $current_page - 1; ?>" 
                            class="px-4 py-2 text-gray-500 hover:text-blue-600 text-sm">Previous</a>
                        <?php endif; ?>
                        
                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <a href="?page=<?php echo $i; ?>" 
                               class="px-4 py-2 <?php echo $i === $current_page 
                                    ? 'bg-blue-600 text-white' 
                                    : 'text-gray-700 hover:bg-gray-100'; ?> rounded-lg text-sm">
                                <?php echo $i; ?>
                            </a>
                        <?php endfor; ?>
                        
                        <?php if ($current_page < $total_pages): ?>
                            <a href="?page=<?php echo $current_page + 1; ?>" 
                               class="px-4 py-2 text-gray-500 hover:text-blue-600 text-sm">Next</a>
                        <?php endif; ?>
                    </nav>
                </div>
            <?php endif; ?>
        </div>
    </section>
</body>
</html>