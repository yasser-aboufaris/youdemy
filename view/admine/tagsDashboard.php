<?php 
include "../../classes/conn.php";
include "../../classes/tag.php";
session_start();

// Vérification de l'authentification admin
// if(!isset($_SESSION['role'])) {
//     header('Location: login.php');
//     exit;
// }

$tags = Tag::readTags($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tags Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
  <!-- Sidebar -->
  <div class="fixed inset-y-0 left-0 w-72 bg-udemy-primary text-black">
    <div class="p-6 border-b border-white/10">
      <h1 class="text-2xl font-bold">YourDemy</h1>
    </div>
    <nav class="mt-6 px-4">
      <!-- Tags (Active) -->
      <a href="#" class="flex items-center space-x-3 bg-white/10 rounded-lg px-4 py-3 mb-2 transition duration-200">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
        </svg>
        <span>Tags</span>
      </a>
      
      <!-- Autres éléments du sidebar... -->
    </nav>
  </div>

  <!-- Main Content -->
  <div class="ml-72 p-8">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
      <div>
        <h2 class="text-3xl font-bold text-gray-800">Tags Management</h2>
        <p class="text-gray-600">Manage your course tags</p>
      </div>
      <div class="flex items-center space-x-4">
        <form method="GET" class="relative">
          <input type="text" name="search" placeholder="Search tags..." 
                 class="w-64 pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-udemy-accent"
                 value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
          <svg class="w-5 h-5 text-gray-500 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
          </svg>
        </form>
        <button class="bg-udemy-accent text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition duration-200">
          Add New Tag
        </button>
      </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
      <div class="bg-white rounded-xl shadow-sm p-6 border border-udemy-border">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-gray-600 text-sm font-medium">Total Tags</h3>
        </div>
        <p class="text-3xl font-bold text-gray-800"><?= count($tags) ?></p>
      </div>
      
      <div class="bg-white rounded-xl shadow-sm p-6 border border-udemy-border">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-gray-600 text-sm font-medium">Most Used Tag</h3>
        </div>
        <p class="text-3xl font-bold text-gray-800"><?= Tag::getMostUsedTag($conn) ?></p>
      </div>
    </div>

    <!-- Tags Table -->
    <div class="bg-white rounded-xl shadow-sm border border-udemy-border overflow-hidden mb-8">
      <div class="p-6 border-b border-udemy-border">
        <h3 class="text-xl font-semibold text-gray-800">Tag List</h3>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tag</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Associated Courses</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <?php foreach($tags as $tag): ?>
            <tr class="hover:bg-gray-50 transition duration-200">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900"><?= htmlspecialchars($tag->getName()) ?></div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900"><?= $tag->getCourseCount($conn) ?> courses</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                <?= date('M d, Y', strtotime($tag->getCreatedAt())) ?>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <button onclick="toggleEditForm(<?= $tag->getId() ?>)" 
                        class="text-udemy-accent hover:text-purple-700 mr-3">Edit</button>
                <form action="delete_tag.php" method="POST" class="inline">
                  <input type="hidden" name="tag_id" value="<?= $tag->getId() ?>">
                  <?= csrf_field() ?>
                  <button type="submit" class="text-red-600 hover:text-red-900" 
                          onclick="return confirm('Êtes-vous sûr ?')">Delete</button>
                </form>
              </td>
            </tr>
            <tr id="editForm_<?= $tag->getId() ?>" class="hidden bg-gray-50">
              <td colspan="4" class="px-6 py-4">
                <form action="update_tag.php" method="POST" class="space-y-4">
                  <input type="hidden" name="tag_id" value="<?= $tag->getId() ?>">
                  <?= csrf_field() ?>
                  <div class="grid grid-cols-2 gap-4">
                    <div>
                      <label class="block text-sm font-medium text-gray-700">Tag Name</label>
                      <input type="text" name="name" value="<?= htmlspecialchars($tag->getName()) ?>" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                            required>
                    </div>
                  </div>
                  <div class="flex justify-end space-x-3">
                    <button type="button" onclick="toggleEditForm(<?= $tag->getId() ?>)" 
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
        </table>
      </div>
    </div>

    <!-- Add Tag Form -->
    <div class="bg-white rounded-xl shadow-sm border border-udemy-border overflow-hidden">
      <div class="p-6">
        <h3 class="text-xl font-semibold text-gray-800 mb-6">Add New Tag</h3>
        <form action="add_tag.php" method="POST" class="space-y-6">
          <?= csrf_field() ?>
          <div>
            <label for="tag_name" class="block text-sm font-medium text-gray-700">Tag Name</label>
            <input type="text" id="tag_name" name="name" required
                  class="mt-1 block w-full px-4 py-2 text-gray-900 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-udemy-accent">
          </div>
          <div>
            <button type="submit" 
                    class="w-full bg-udemy-accent text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-purple-700 transition">
              Add Tag
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
  function toggleEditForm(id) {
    const formRow = document.getElementById(`editForm_${id}`);
    document.querySelectorAll('[id^="editForm_"]').forEach(form => {
      if(form.id !== `editForm_${id}`) form.classList.add('hidden');
    });
    formRow.classList.toggle('hidden');
  }
  </script>
</body>
</html>