<?php
include '../../classes/conn.php';
include '../../classes/tags.php';
include '../../classes/courses.php';
include '../../classes/categories.php';
session_start();
if(($_SESSION['role'] != 2) || !isset($_SESSION['role'])){
    header('Location: ../autentification/login.php');
}
$tags = Tag::readTags($conn);
$categories = Categorie::readCategories($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Create Course</title>
</head>
<body class="min-h-screen bg-gradient-to-b from-purple-50 to-white">
    <!-- Top Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-shrink-0">
                    <h1 class="text-2xl font-bold text-purple-600">YourDemy</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">Welcome, Instructor</span>
                    <img src="/api/placeholder/32/32" alt="User" class="w-8 h-8 rounded-full"/>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <form action="../../includs/teacher/courseAdd.php" method="POST"  class="space-y-8 divide-y divide-gray-200">
            <!-- Basic Information -->
            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                <div class="space-y-6 sm:space-y-5">
                <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:gap-4">
    <label for="title" class="text-sm font-medium text-gray-700 sm:w-1/3">
        Course Title <span class="text-red-500">*</span>
    </label>
    <div class="flex-1">
        <input 
            type="text" 
            id="title" 
            name="title" 
            required 
            class="w-full rounded-lg border border-gray-300 bg-white p-2 text-sm shadow-sm placeholder-gray-400 focus:border-purple-500 focus:ring-1 focus:ring-purple-500" 
            placeholder="Enter a compelling title" 
        />
        <p class="mt-1 text-xs text-gray-500" id="titleCount">0/100 characters</p>
    </div>
</div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-6 sm:items-start sm:pt-6">
    <label for="category" class="block text-lg font-semibold text-gray-800 sm:mt-px sm:pt-2">
        Category *
    </label>
    <div class="mt-2 sm:mt-0 sm:col-span-2">
        <select id="category" name="category" required
                class="block w-full p-4 rounded-lg border-2 border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 sm:text-sm">

            <option value="">Select a category</option>
            <?php
            foreach ($categories as $category) { ?>
                <option value="<?php echo $category->getId(); ?>"><?php echo $category->getName(); ?></option>
                <?php }
            ?>

        </select>
    </div>
</div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-6 sm:items-start sm:pt-6">
    <label for="description" class="block text-lg font-semibold text-gray-800 sm:mt-px sm:pt-2">
        Description *
    </label>
    <div class="mt-2 sm:mt-0 sm:col-span-2">
        <textarea id="description" name="description" rows="4" required
                class="block w-full p-4 rounded-lg border-2 border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 sm:text-sm"
                placeholder="Describe what students will learn"></textarea>
        <p class="mt-2 text-sm text-gray-500" id="descriptionCount">0/500 characters</p>
    </div>
</div>
                </div>
            </div>

            <!-- Content Section -->
            <div class="sm:grid sm:grid-cols-3 sm:gap-6 sm:items-start sm:pt-6">
    <label for="content" class="block text-lg font-semibold text-gray-800 sm:mt-px sm:pt-2">
        Course Content *
    </label>
    <div class="mt-2 sm:mt-0 sm:col-span-2">
        <textarea id="content" name="content" rows="8" required
                class="block w-full p-4 rounded-lg border-2 border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 sm:text-sm"
                placeholder="Enter your course content here"></textarea>
        <p class="mt-2 text-sm text-gray-500" id="contentCount">0/5000 characters</p>
    </div>
</div>

            <!-- Tags Section -->
            <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
    <div>
        <h3 class="text-lg leading-6 font-medium text-gray-900">Course Tags</h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">Select all that apply</p>
    </div>

    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Tags</label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="grid grid-cols-2 gap-4">
                <?php foreach($tags as $tag): ?>
                    <div class="relative flex items-start">
                        <div class="flex h-5 items-center">
                            <input 
                                type="checkbox" 
                                id="tag_<?php echo $tag->getId(); ?>" 
                                name="tags[]" 
                                value="<?php echo $tag->getId(); ?>"
                                class="h-4 w-4 rounded border-gray-300 text-purple-600 focus:ring-purple-500"
                            />
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="tag_<?php echo $tag->getId(); ?>" class="font-medium text-gray-700">
                                <?php echo htmlspecialchars($tag->getName()); ?>
                            </label>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

            <!-- Submit Section -->
            <div class="pt-5">
                <div class="flex justify-end space-x-3">
                    <button type="submit"
                            class="inline-flex justify-center rounded-md border border-transparent bg-purple-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                        Create Course
                    </button>
                </div>
            </div>
        </form>
    </main>
</body>
</html>