<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Signup Form</title>
</head>
<body class="bg-gradient-to-br from-purple-50 to-indigo-50 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white shadow-xl rounded-2xl p-8 max-w-md w-full">
        <!-- Logo/Icon Placeholder -->
        <div class="flex justify-center mb-6">
            <div class="bg-violet-100 p-3 rounded-full">
                <svg class="w-8 h-8 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4"></path>
                </svg>
            </div>
        </div>

        <!-- Heading -->
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-2">Create Account</h2>
        <p class="text-gray-500 text-center mb-8">Join our community today!</p>

        <!-- Form -->
        <form action="../../includs/commun/signUpMethode.php" method="POST" class="space-y-6">
            <!-- Full Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                <input type="text" id="name" name="name" placeholder="John Doe" 
                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-violet-500 focus:border-violet-500 focus:outline-none transition duration-200 bg-gray-50 hover:bg-white">
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <input type="email" id="email" name="email" placeholder="you@example.com" 
                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-violet-500 focus:border-violet-500 focus:outline-none transition duration-200 bg-gray-50 hover:bg-white">
            </div>

            <!-- Role Selection -->
            <div>
                <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Select Role</label>
                <select id="role" name="role" 
                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-violet-500 focus:border-violet-500 focus:outline-none transition duration-200 bg-gray-50 hover:bg-white">
                    <option value="">Select your role</option>
                    <option value="1">TEACHER</option>
                    <option value="3">STUDENT</option>

                </select>
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" id="password" name="password" placeholder="••••••••" 
                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-violet-500 focus:border-violet-500 focus:outline-none transition duration-200 bg-gray-50 hover:bg-white">
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="confirm-password" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="••••••••" 
                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-violet-500 focus:border-violet-500 focus:outline-none transition duration-200 bg-gray-50 hover:bg-white">
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" 
                    class="w-full bg-violet-600 text-white py-3 rounded-lg font-semibold hover:bg-violet-700 focus:ring-4 focus:ring-violet-200 transition duration-200 transform hover:scale-[1.02]">
                    Create Account
                </button>
            </div>
        </form>

        <!-- Footer -->
        <p class="text-sm text-gray-500 mt-8 text-center">
            Already have an account? 
            <a href="./login.php" class="text-violet-600 font-semibold hover:text-violet-700 hover:underline transition duration-200">Log in</a>
        </p>
    </div>
</body>
</html>