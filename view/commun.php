<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>YouDem - Learn at Your Pace</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <?php include "../classes/conn.php";
  include "../classes/categories.php";
  $categories=Categorie::readCategories($conn);
  ?>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
  <header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="container mx-auto">
      <div class="flex justify-between items-center py-4 px-6">
        <a href="#" class="flex items-center space-x-2">
          <span class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 text-transparent bg-clip-text">YouDem</span>
        </a>
        <nav class="hidden md:flex items-center space-x-8">
          <a href="#" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">Home</a>
          <a href="#" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">Courses</a>
          <a href="#" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">About</a>
          <a href="#" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">Contact</a>
        </nav>
        <div class="flex items-center space-x-4">
          <a href="#" class="px-6 py-2.5 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors shadow-sm">Login</a>
          <button class="md:hidden">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
          </button>
        </div>
      </div>
    </div>
  </header>

  <main class="flex-grow">
    <!-- Hero Section -->
    <section class="bg-gradient-to-b from-blue-50 to-white py-20">
      <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto text-center">
          <h1 class="text-5xl font-bold text-gray-900 mb-6">Unlock Your Potential with YouDem</h1>
          <p class="text-xl text-gray-600 mb-8">Learn from industry experts at your own pace. Access high-quality courses designed to help you succeed.</p>
          <div class="flex justify-center space-x-4">
            <a href="#" class="px-8 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors shadow-sm">Browse Courses</a>
            <a href="#" class="px-8 py-3 bg-white text-blue-600 font-semibold rounded-lg hover:bg-gray-50 transition-colors shadow-sm border border-blue-600">Try for Free</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Categories Section -->
    <section class="py-16">
      <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-gray-900 mb-8">Explore Categories</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <?php foreach($categories as $row){ ?>
          <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow p-6 border border-gray-100">
            <div class="bg-blue-50 rounded-lg w-12 h-12 flex items-center justify-center mb-4">
              <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
              </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Category Title</h3>
            <p class="text-gray-600 mb-4">Discover courses in this category and start learning today.</p>
            <a href="#" class="text-blue-600 font-medium hover:text-blue-700 transition-colors flex items-center">
              Browse Courses
              <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
              </svg>
            </a>
          </div>
          <?php } ?>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section class="bg-gray-50 py-16">
      <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">Why Choose YouDem</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="text-center">
            <div class="bg-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4 shadow-sm">
              <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Learn at Your Pace</h3>
            <p class="text-gray-600">Study whenever and wherever you want with lifetime access to courses.</p>
          </div>
          <div class="text-center">
            <div class="bg-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4 shadow-sm">
              <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
              </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Expert Instructors</h3>
            <p class="text-gray-600">Learn from industry professionals with real-world experience.</p>
          </div>
          <div class="text-center">
            <div class="bg-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4 shadow-sm">
              <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Certificate of Completion</h3>
            <p class="text-gray-600">Earn certificates to showcase your newfound skills.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer class="bg-white border-t border-gray-100">
    <div class="container mx-auto px-6 py-12">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div>
          <h4 class="text-lg font-bold text-gray-900 mb-4">About YouDem</h4>
          <p class="text-gray-600">Empowering learners worldwide with quality education accessible to everyone.</p>
        </div>
        <div>
          <h4 class="text-lg font-bold text-gray-900 mb-4">Quick Links</h4>
          <ul class="space-y-2">
            <li><a href="#" class="text-gray-600 hover:text-blue-600">Courses</a></li>
            <li><a href="#" class="text-gray-600 hover:text-blue-600">Become an Instructor</a></li>
            <li><a href="#" class="text-gray-600 hover:text-blue-600">About Us</a></li>
          </ul>
        </div>
        <div>
          <h4 class="text-lg font-bold text-gray-900 mb-4">Support</h4>
          <ul class="space-y-2">
            <li><a href="#" class="text-gray-600 hover:text-blue-600">Help Center</a></li>
            <li><a href="#" class="text-gray-600 hover:text-blue-600">Terms of Service</a></li>
            <li><a href="#" class="text-gray-600 hover:text-blue-600">Privacy Policy</a></li>
          </ul>
        </div>
        <div>
          <h4 class="text-lg font-bold text-gray-900 mb-4">Contact Us</h4>
          <ul class="space-y-2">
            <li class="text-gray-600">Email: support@youdem.com</li>
            <li class="text-gray-600">Phone: +1 (555) 123-4567</li>
          </ul>
        </div>
      </div>
      <div class="border-t border-gray-100 mt-8 pt-8 text-center">
        <p class="text-gray-600">&copy; 2025 YouDem. All rights reserved.</p>
      </div>
    </div>
  </footer>
</body>
</html>