<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com"></script>
<title>Login Form</title>
</head>
<body class="bg-white min-h-screen flex items-center justify-center">
<div class="bg-white shadow-lg rounded-lg p-6 max-w-sm w-full border-t-4 border-violet-500">
    <!-- Heading -->
    <h2 class="text-3xl font-bold text-violet-700 text-center mb-4">Log In</h2>
    <p class="text-gray-500 text-center mb-6">Welcome back! Please login to your account.</p>

    <!-- Form -->
    <form action="#" method="POST" class="space-y-4">
    <!-- Email -->
    <div>
        <label for="email" class="block text-sm font-medium text-violet-700">Email Address</label>
        <input type="email" id="email" name="email" placeholder="you@example.com" 
        class="w-full mt-1 px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-violet-500 focus:outline-none transition shadow-sm">
    </div>

    <!-- Password -->
    <div>
        <label for="password" class="block text-sm font-medium text-violet-700">Password</label>
        <input type="password" id="password" name="password" placeholder="••••••••" 
        class="w-full mt-1 px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-violet-500 focus:outline-none transition shadow-sm">
    </div>

    <!-- Submit Button -->
    <div>
        <button type="submit" 
        class="w-full bg-violet-700 text-white py-2 rounded-lg font-semibold hover:bg-violet-800 focus:ring-4 focus:ring-violet-500 focus:ring-offset-2 transition shadow-md">
        Log In
        </button>
    </div>
    </form>

    <!-- Footer -->
    <p class="text-sm text-gray-500 mt-4 text-center">
    Don't have an account? 
    <a href="#" class="text-violet-600 font-semibold hover:underline">Sign up</a>
    </p>
</div>
</body>
</html>
