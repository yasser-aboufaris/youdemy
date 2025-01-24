<?php
require_once '../../classes/courses.php'; 
require_once '../../classes/conn.php';  

// Get search term from query string
$searchTerm = isset($_GET['search']) ? trim($_GET['search']) : '';
$courses = [];

// Perform search if we have a search term
if (!empty($searchTerm)) {
    try {
        $courses = Course::searchCourses($conn, $searchTerm);
    } catch (Exception $e) {
        $error = "Error performing search: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Search</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <!-- Search Header -->
        <div class="max-w-3xl mx-auto mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Course Search</h1>
            
            <!-- Search Form -->
            <form method="GET" action="" class="space-y-4">
                <div class="flex gap-2">
                    <input type="text" 
                           name="search" 
                           value="<?= htmlspecialchars($searchTerm) ?>"
                           placeholder="Search courses by name..."
                           class="flex-1 px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                    <button type="submit" 
                            class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Search
                    </button>
                </div>
            </form>
        </div>

        <!-- Error Message -->
        <?php if (isset($error)): ?>
            <div class="max-w-3xl mx-auto bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <!-- Search Results -->
        <?php if (!empty($searchTerm)): ?>
            <div class="max-w-3xl mx-auto">
                <h2 class="text-xl font-semibold mb-6 text-gray-700">
                    <?= count($courses) ?> results for "<?= htmlspecialchars($searchTerm) ?>"
                </h2>

                <?php if (empty($courses)): ?>
                    <div class="text-center py-12 bg-white rounded-lg shadow-sm">
                        <p class="text-gray-500">No courses found matching your search criteria.</p>
                    </div>
                <?php else: ?>
                    <div class="space-y-4">
                        <?php foreach ($courses as $course): ?>
                            <article class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h3 class="text-xl font-semibold text-gray-800 mb-2">
                                            <?= htmlspecialchars($course->getTitle()) ?>
                                        </h3>
                                        <p class="text-gray-600 mb-3">
                                            <?= htmlspecialchars($course->getDescription()) ?>
                                        </p>
                                    </div>
                                    <?php if ($course->getType() === 'premium'): ?>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full bg-yellow-100 text-yellow-800 text-sm font-medium">
                                            Premium
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="flex items-center gap-4 text-sm text-gray-500 mb-4">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        <?= htmlspecialchars($course->getTeacher()) ?>
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                        </svg>
                                        <?= htmlspecialchars($course->getCategorie()) ?>
                                    </div>
                                </div>

                                <!-- Type-specific Action Button -->
                                <?php if ($course->getType() === 'video'): ?>
                                    <a href="courseReadVideo.php?id_course=<?= $course->getId() ?>" 
                                       class="inline-block px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors mb-4">
                                        <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        Watch Video
                                    </a>
                                <?php elseif ($course->getType() === 'text'): ?>
                                    <a href="courseReadText.php?id_course=<?= $course->getId() ?>" 
                                       class="inline-block px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors mb-4">
                                        <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                        </svg>
                                        Read Article
                                    </a>
                                <?php endif; ?>

                                <?php if (!empty($course->tags)): ?>
                                    <div class="flex flex-wrap gap-2">
                                        <?php foreach ($course->tags as $tag): ?>
                                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">
                                                <?= htmlspecialchars($tag) ?>
                                            </span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </article>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>