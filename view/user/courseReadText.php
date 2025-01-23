<?php include "../../classes/courses.php"
include "../../classes/conn.php";
$id_course = $_GET['id_course'];
Course::readCoursesDetails($conn,$id_course);
tags::readTagsByCourse($conn,$id_course);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Python for Data Analysis - Full Course</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="flex min-h-screen">
        <!-- Sidebar Navigation -->
        <div class="w-64 bg-white shadow-md p-6">
            <h2 class="text-xl font-bold mb-6">Course Modules</h2>
            <ul class="space-y-2">
                <li class="bg-blue-100 p-2 rounded">
                    <a href="#" class="text-blue-800">Introduction to Data Analysis</a>
                </li>
                <li class="p-2 hover:bg-gray-100 rounded">
                    <a href="#" class="text-gray-700">Python Basics</a>
                </li>
                <li class="p-2 hover:bg-gray-100 rounded">
                    <a href="#" class="text-gray-700">Data Manipulation</a>
                </li>
                <li class="p-2 hover:bg-gray-100 rounded">
                    <a href="#" class="text-gray-700">Data Visualization</a>
                </li>
                <li class="p-2 hover:bg-gray-100 rounded">
                    <a href="#" class="text-gray-700">Statistical Analysis</a>
                </li>
            </ul>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 overflow-y-auto">
            <!-- Course Header -->
            <div class="bg-blue-600 text-white p-8">
                <div class="max-w-4xl mx-auto">
                    <h1 class="text-3xl font-bold mb-4">Python for Data Analysis</h1>
                    <p class="text-blue-100 text-xl">Comprehensive course to master data analysis techniques using Python</p>
                </div>
            </div>

            <!-- Course Content -->
            <div class="max-w-4xl mx-auto p-8">
                <div class="bg-white shadow-lg rounded-lg p-8">
                    <h2 class="text-2xl font-semibold mb-6 text-gray-800">Module 1: Introduction to Data Analysis</h2>
                    
                    <div class="space-y-6">
                        <section>
                            <h3 class="text-xl font-medium mb-4 text-gray-700">What is Data Analysis?</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Data analysis is a comprehensive process of inspecting, cleaning, transforming, and modeling data to discover useful information, draw conclusions, and support decision-making. In this course, you'll learn how to leverage Python's powerful libraries to perform sophisticated data analysis.
                            </p>
                        </section>

                        <section>
                            <h3 class="text-xl font-medium mb-4 text-gray-700">Learning Objectives</h3>
                            <ul class="list-disc list-inside text-gray-600 space-y-2">
                                <li>Understand the fundamentals of data analysis</li>
                                <li>Learn to use Pandas for data manipulation</li>
                                <li>Create insightful visualizations with Matplotlib and Seaborn</li>
                                <li>Perform statistical analysis and hypothesis testing</li>
                            </ul>
                        </section>


                    </div>
                </div>

                <!-- Quiz Section -->
                <div class="mt-8 bg-white shadow-lg rounded-lg p-8">
                    <h2 class="text-2xl font-semibold mb-6 text-gray-800">Module 1 Quiz</h2>
                    <div class="space-y-4">
                        <div class="bg-gray-100 p-6 rounded-lg">
                            <p class="font-medium mb-4 text-lg">What is the primary purpose of data analysis?</p>
                            <div class="space-y-3">
                                <label class="flex items-center">
                                    <input type="radio" name="quiz1" class="mr-3">
                                    <span class="text-gray-700">Collect random data</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="quiz1" class="mr-3">
                                    <span class="text-gray-700">Create complex visualizations</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="quiz1" class="mr-3">
                                    <span class="text-gray-700">Discover useful information and support decision-making</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>