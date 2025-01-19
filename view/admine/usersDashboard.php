<?php 
include "../../classes/conn.php";
include "../../classes/client.php";
$users =Client::readClients($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Course Dashboard</title>
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

    <!-- Users -->
    <a href="#" class="flex items-center space-x-3 hover:bg-white/10 rounded-lg px-4 py-3 mb-2 transition duration-200">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
      </svg>
      <span>Users</span>
    </a>

    <!-- Categories -->
    <a href="#" class="flex items-center space-x-3 hover:bg-white/10 rounded-lg px-4 py-3 mb-2 transition duration-200">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
      </svg>
      <span>Categories</span>
    </a>

    <!-- Tags -->
    <a href="#" class="flex items-center space-x-3 hover:bg-white/10 rounded-lg px-4 py-3 mb-2 transition duration-200">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
      </svg>
      <span>Tags</span>
    </a>

    <!-- Pending Teachers -->
    <a href="#" class="flex items-center space-x-3 hover:bg-white/10 rounded-lg px-4 py-3 mb-2 transition duration-200">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
      </svg>
      <span>Pending Teachers</span>
    </a>
  </nav>
</div>

  <!-- Main Content -->
  <div class="ml-72 p-8">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
      <div>
        <h2 class="text-3xl font-bold text-gray-800">Dashboard Overview</h2>
        <p class="text-gray-600">Welcome back, Admin</p>
      </div>
      <div class="flex items-center space-x-4">
        <div class="relative">
          <input type="text" placeholder="Search..." class="w-64 pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-udemy-accent">
          <svg class="w-5 h-5 text-gray-500 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
          </svg>
        </div>
        <button class="bg-udemy-accent text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition duration-200">
          Add New User
        </button>
      </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
      <div class="bg-white rounded-xl shadow-sm p-6 border border-udemy-border">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-gray-600 text-sm font-medium">Total Users</h3>
        </div>
        <p class="text-3xl font-bold text-gray-800"><?php echo count($users)?></p>
        <div class="mt-2 text-sm text-gray-600">in youcourse</div>
      </div>


      <div class="bg-white rounded-xl shadow-sm p-6 border border-udemy-border">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-gray-600 text-sm font-medium">teachers</h3>
        </div>
        <p class="text-3xl font-bold text-gray-800">45</p>
        <div class="mt-2 text-sm text-gray-600">teachers</div>
      </div>

      <div class="bg-white rounded-xl shadow-sm p-6 border border-udemy-border">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-gray-600 text-sm font-medium">average student per class</h3>
        </div>
        <p class="text-3xl font-bold text-gray-800">89%</p>
        <div class="mt-2 text-sm text-gray-600">Completion rate</div>
      </div>
    </div>

    <!-- Users Table -->
    <div class="bg-white rounded-xl shadow-sm border border-udemy-border overflow-hidden">
      <div class="p-6 border-b border-udemy-border">
        <h3 class="text-xl font-semibold text-gray-800">Recent Users</h3>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Joined</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <!-- <tr class="hover:bg-gray-50 transition duration-200">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="h-10 w-10 flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="/api/placeholder/40/40" alt="User avatar">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">John Doe</div>
                    <div class="text-sm text-gray-500">john.doe@example.com</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                  Student
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  Active
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                Jan 15, 2024
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <button class="text-udemy-accent hover:text-purple-700 mr-3">Edit</button>
                <button class="text-red-600 hover:text-red-900">Delete</button>
              </td>
            </tr>
            <tr class="hover:bg-gray-50 transition duration-200"> -->
              <?php 
              foreach($users as $object){
              ?>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="h-10 w-10 flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="/api/placeholder/40/40" alt="User avatar">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900"><?php echo $object->getUserName();?></div>
                    <div class="text-sm text-gray-500"><?php echo $object->getEmail();?></div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                  Instructor
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  Active
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                Jan 12, 2024
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <button class="text-red-600 hover:text-red-900">ban</button>
              </td>
            </tr><?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>