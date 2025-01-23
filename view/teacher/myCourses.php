<?php
include "../../classes/conn.php" ;
include "../../classes/courses.php";
$courses = Course::readCourses($conn);
session_start();
if(($_SESSION['role'] != 2) || !isset($_SESSION['role'])){
    header('Location: ../autentification/login.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Courses Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-50">
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <span class="text-xl font-bold text-gray-800">TeacherDash</span>
                </div>
                <div class="flex items-center">
                    <img src="/api/placeholder/40/40" alt="Teacher Profile" class="h-10 w-10 rounded-full">
                    <span class="ml-3 font-medium text-gray-700">John Doe</span>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">My Courses</h1>
                <p class="mt-1 text-gray-500">Manage your current courses and assignments</p>
            </div>
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition-colors">
                <i class="fas fa-plus"></i>
                Add New Course
            </button>
        </div>

        <!-- Stats Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                        <i class="fas fa-book text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Total Courses</p>
                        <p class="text-2xl font-semibold text-gray-900">12</p>
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-600">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Total Students</p>
                        <p class="text-2xl font-semibold text-gray-900">284</p>
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                        <i class="fas fa-clock text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Hours Taught</p>
                        <p class="text-2xl font-semibold text-gray-900">156</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search and Filter Section -->
        <div class="mb-6 flex flex-col sm:flex-row gap-4">
            <div class="relative flex-1">
                <input type="text" placeholder="Search courses..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
            </div>
            <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option>All Courses</option>
                <option>Active</option>
                <option>Inactive</option>
            </select>
        </div>

        <!-- Courses Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    
            <?php foreach($courses as $course) { ?>
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-lg font-semibold text-gray-900"><?php $course->getTitle()?></h3>
                        <span class="px-2 py-1 text-sm rounded-full bg-gray-100 text-gray-800">Inactive</span>
                    </div>
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center text-gray-600">
                            <i class="fas fa-users w-5"></i>
                            <span class="ml-2">30 Students</span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <i class="fas fa-clock w-5"></i>
                            <span class="ml-2">Mon, Fri 1:00 PM</span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <i class="fas fa-calendar w-5"></i>
                            <span class="ml-2">Sept 2024 - Dec 2024</span>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <button class="flex-1 px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 flex items-center justify-center gap-2">
                            <i class="fas fa-edit"></i>
                            Edit
                        </button>
                        <button class="flex-1 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 flex items-center justify-center gap-2">
                            <i class="fas fa-trash"></i>
                            Delete
                        </button>
                    </div>
                </div>
            </div><?php } ?>
        </div>
    </main>
</body>
</html>