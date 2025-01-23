<?php 
include "../../classes/conn.php" ;
include "../../classes/courses.php";
include "../../classes/categories.php";
$id_categorie = $_GET['id'];
$courses = Course::readCoursesByCategorie($conn,$id_categorie)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> YouDemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <section class="py-12">
        <div class="container mx-auto px-4">
            <!-- Header and Filters -->
            <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Explore Our Courses</h1>
                    <p class="mt-2 text-gray-600">Discover the perfect course to advance your skills</p>
                </div>
                <div class="mt-4 md:mt-0 flex flex-wrap gap-4">
                    <select class="px-4 py-2 bg-white border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">All Categories</option>
                        <option value="development">Development</option>
                        <option value="business">Business</option>
                        <option value="design">Design</option>
                    </select>
                    <select class="px-4 py-2 bg-white border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Sort By</option>
                        <option value="popular">Most Popular</option>
                        <option value="newest">Newest</option>
                        <option value="price-low">Price: Low to High</option>
                        <option value="price-high">Price: High to Low</option>
                    </select>
                </div>
            </div>

            <!-- Course List -->
            <div class="space-y-6">
                <!-- Course Card -->
                <?php foreach($courses as $course): ?>
    <div class="flex items-center bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300 p-4 space-x-4">
        <div class="flex-1">
            <h3 class="text-lg font-semibold text-gray-800 hover:text-blue-500 transition-colors">
                <?php echo htmlspecialchars($course->getTitle()); ?>
            </h3>
            <p class="text-sm text-gray-600 mt-1 line-clamp-2">
                <?php echo htmlspecialchars($course->getDescription()); ?>
            </p>
            <div class="flex items-center text-xs text-gray-500 mt-3 space-x-6">
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.318l-1.318 2.684-2.946.429 2.132 2.084-.503 2.943L12 11.446l2.635 1.012-.503-2.943 2.132-2.084-2.946-.429L12 4.318z" />
                    </svg>
                    4.8 (2,456)
                </div>
            </div>
        </div>
        <div class="text-right flex-shrink-0">
            <?php if ($course->getType() === "video"): ?>
                <a href="./index.php?id_course=<?php echo htmlspecialchars($course->getId()); ?>" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors text-sm font-medium">View Course</a>
            <?php elseif ($course->getType() === "text"): ?>
                <a href="./index.php?id_course=<?php echo htmlspecialchars($course->getId()); ?>" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors text-sm font-medium">View Course</a>
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; ?>
            </div>
        </div>
    </section>
</body>
</html>