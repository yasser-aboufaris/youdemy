<?php include "../classes/conn.php";
include "../classes/categories.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>YouDem - Learn at Your Pace</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
  <header class="bg-white shadow">
    <div class="container mx-auto flex justify-between items-center p-4">
      <a href="#" class="text-2xl font-bold text-blue-600">YouDem</a>
      <nav>
        <ul class="flex space-x-4">
          <li><a href="#" class="text-gray-700 hover:text-blue-600">Home</a></li>
          <li><a href="#" class="text-gray-700 hover:text-blue-600">Courses</a></li>
          <li><a href="#" class="text-gray-700 hover:text-blue-600">About</a></li>
          <li><a href="#" class="text-gray-700 hover:text-blue-600">Contact</a></li>
        </ul>
      </nav>
      <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded">Login</a>
    </div>
  </header>

  <main class="container mx-auto mt-8 p-4">
    <section class="mb-8">
      <h1 class="text-4xl font-bold text-gray-800">Welcome to YouDem</h1>
      <p class="mt-2 text-gray-600">Learn at your own pace with a variety of courses from expert instructors.</p>
    </section>

    <section>
      <h2 class="text-2xl font-bold text-gray-800 mb-4">Popular Courses</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Course Card 1 -->
        <div class="bg-white rounded-lg shadow p-4">
          <img src="course-image.jpg" alt="Course" class="w-full h-40 object-cover rounded">
          <h3 class="text-xl font-bold text-gray-800 mt-4">Course Title 1</h3>
          <p class="mt-2 text-gray-600">Short description of the course content.</p>
          <a href="#" class="text-blue-600 mt-4 inline-block">Learn More</a>
        </div>
        <!-- Add more course cards as needed -->
      </div>
    </section>
  </main>

  <footer class="bg-white shadow mt-8">
    <div class="container mx-auto p-4 text-center text-gray-600">
      &copy; 2025 YouDem. All rights reserved.
    </div>
  </footer>
</body>
</html>
