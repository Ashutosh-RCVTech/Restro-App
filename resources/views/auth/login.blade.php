<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script> <!-- Use Tailwind CSS -->
</head>
<body class="bg-gradient-to-br from-blue-100 via-white to-blue-100 min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
        <h1 class="text-xl font-bold text-blue-700">🍽️ RestroApp</h1>
        <nav>
            <a href="{{ route('register') }}" class="text-blue-600 font-medium hover:underline">Register</a>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center px-4 py-12">
        <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md border border-gray-200">
            <h2 class="text-3xl font-bold mb-6 text-center text-blue-700">Login</h2>

            @if (session('error'))
                <div class="mb-4 text-red-600 text-sm">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>

                <div>
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition-all duration-200">
                        Login
                    </button>
                </div>
            </form>

            <p class="mt-6 text-center text-sm text-gray-600">
                Don't have an account? 
                <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register here</a>
            </p>
        </div>
    </main>

    <!-- Footer -->
    <footer class="text-center py-4 text-sm text-gray-500">
        &copy; {{ date('Y') }} RestroApp. All rights reserved.
    </footer>

</body>
</html>
