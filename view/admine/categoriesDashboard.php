<?php 
include "../../classes/conn.php";
include "../../classes/categories.php";
$categories = Categorie::readCategories($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Categories Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
  <!-- Sidebar -->
  <div class="fixed inset-y-0 left-0 w-72 bg-udemy-primary text-black">
    <div class="p-6 border-b border-white/10">
      <h1 class="text-2xl font-bold">YourDemy</h1>
    </div>
    <nav class="mt-6 px-4">
      <!-- Dashboard -->
      <a href="#" class="flex items-center space-x-3 hover:bg-white/10 rounded-lg px-4 py-3 mb-2 transition duration-200">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
        </svg>
        <span>Dashboard</span>
      </a>

      <!-- Categories (Active) -->
      <a href="#" class="flex items-center space-x-3 bg-white/10 rounded-lg px-4 py-3 mb-2 transition duration-200">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
        </svg>
        <span>Categories</span>
      </a>

      <!-- Courses -->
      <a href="#" class="flex items-center space-x-3 hover:bg-white/10 rounded-lg px-4 py-3 mb-2 transition duration-200">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
        </svg>
        <span>Courses</span>
      </a>

      <!-- Tags -->
      <a href="#" class="flex items-center space-x-3 hover:bg-white/10 rounded-lg px-4 py-3 mb-2 transition duration-200">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
        </svg>
        <span>Tags</span>
      </a>
    </nav>
  </div>

  <!-- Main Content -->
  <div class="ml-72 p-8">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
      <div>
        <h2 class="text-3xl font-bold text-gray-800">Categories Management</h2>
        <p class="text-gray-600">Manage your course categories</p>
      </div>
      <div class="flex items-center space-x-4">
        <div class="relative">
          <input type="text" placeholder="Search categories..." class="w-64 pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-udemy-accent">
          <svg class="w-5 h-5 text-gray-500 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
          </svg>
        </div>
        <button class="bg-udemy-accent text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition duration-200">
          Add New Category
        </button>
      </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
      <div class="bg-white rounded-xl shadow-sm p-6 border border-udemy-border">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-gray-600 text-sm font-medium">Total Categories</h3>
        </div>
        <p class="text-3xl font-bold text-gray-800">12</p>
        <div class="mt-2 text-sm text-gray-600">Active categories</div>
      </div>

      <div class="bg-white rounded-xl shadow-sm p-6 border border-udemy-border">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-gray-600 text-sm font-medium">Most Popular</h3>
        </div>
        <p class="text-3xl font-bold text-gray-800">Development</p>
        <div class="mt-2 text-sm text-gray-600">3.2k courses</div>
      </div>

      <div class="bg-white rounded-xl shadow-sm p-6 border border-udemy-border">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-gray-600 text-sm font-medium">Fastest Growing</h3>
        </div>
        <p class="text-3xl font-bold text-gray-800">AI & ML</p>
        <div class="mt-2 text-sm text-gray-600">+156% this month</div>
      </div>

      <div class="bg-white rounded-xl shadow-sm p-6 border border-udemy-border">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-gray-600 text-sm font-medium">Average Courses</h3>
        </div>
        <p class="text-3xl font-bold text-gray-800">245</p>
        <div class="mt-2 text-sm text-gray-600">Per category</div>
      </div>
    </div>

    <!-- Categories Table -->
    <div class="bg-white rounded-xl shadow-sm border border-udemy-border overflow-hidden mb-8">
      <div class="p-6 border-b border-udemy-border">
        <h3 class="text-xl font-semibold text-gray-800">Category List</h3>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
  <?php foreach($categories as $row): ?>
  <tr class="hover:bg-gray-50 transition duration-200">
    <td class="px-6 py-4 whitespace-nowrap">
      <div class="flex items-center">
        <div class="ml-4">
          <div class="text-sm font-medium text-gray-900"><?php echo $row->getName(); ?></div>
        </div>
      </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
      <div class="text-sm text-gray-900"><?php echo $row->getDescription(); ?></div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
      Jan 12, 2024
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
      <button onclick="toggleEditForm(<?php echo $row->getId(); ?>)" class="text-udemy-accent hover:text-purple-700 mr-3">Edit</button>
      <button class="text-red-600 hover:text-red-900">Delete</button>
    </td>
  </tr>
  <!-- Hidden Edit Form Row -->
  <tr id="editForm_<?php echo $row->getId(); ?>" class="hidden bg-gray-50">
    <td colspan="4" class="px-6 py-4">
      <form action="/update-category" method="POST" class="space-y-4">
        <input type="hidden" name="category_id" value="<?php echo $row->getId(); ?>">
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" value="<?php echo $row->getName(); ?>" 
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Description</label>
            <input type="text" name="description" value="<?php echo $row->getDescription(); ?>" 
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
          </div>
        </div>
        <div class="flex justify-end space-x-3">
          <button type="button" onclick="toggleEditForm(<?php echo $row->getId(); ?>)" 
                  class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded">
            Cancel
          </button>
          <button type="submit" 
                  class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded">
            Save Changes
          </button>
        </div>
      </form>
    </td>
  </tr>
  <?php endforeach; ?>
</tbody>

<script>
function toggleEditForm(id) {
  const formRow = document.getElementById(`editForm_${id}`);
  
  // Hide all other open forms first
  document.querySelectorAll('[id^="editForm_"]').forEach(form => {
    if (form.id !== `editForm_${id}`) {
      form.classList.add('hidden');
    }
  });
  
  // Toggle the clicked form
  formRow.classList.toggle('hidden');
}
</script>
        </table>
      </div>
    </div>

    <!-- Form Container -->
    <div class="bg-white rounded-xl shadow-sm border border-udemy-border overflow-hidden">
      <div class="p-6">
        <h3 class="text-xl font-semibold text-gray-800 mb-6">Add New Category</h3>
        
        <form action="#" method="POST" class="space-y-6">
          <!-- Category Name -->
          <div>
            <label for="categorie_name" class="block text-sm font-medium text-gray-700">Category Name</label>
            <input type="text" id="categorie_name" name="categorie_name" required 
                  class="mt-1 block w-full px-4 py-2 text-gray-900 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-udemy-accent focus:border-udemy-accent">
          </div>

          <!-- Category Description -->
          <div>
            <label for="categorie_description" class="block text-sm font-medium text-gray-700">Category Description</label>
            <textarea id="categorie_description" name="categorie_description" required rows="4" 
                      class="mt-1 block w-full px-4 py-2 text-gray-900 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-udemy-accent focus:border-udemy-accent"></textarea>
          </div>

          <!-- Submit Button -->
          <div>
            <button type="submit" 
                    class="w-full bg-udemy-accent text-purple-700 font-semibold py-2 px-4 rounded-lg shadow-md hover:text-white hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-udemy-accent">
              Add Category
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>