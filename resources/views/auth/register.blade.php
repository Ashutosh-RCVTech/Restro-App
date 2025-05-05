<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - RestroApp</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 via-white to-blue-100 min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
        <h1 class="text-xl font-bold text-blue-700">🍽️ RestroApp</h1>
        <nav>
            <a href="{{ route('login') }}" class="text-blue-600 font-medium hover:underline">Login</a>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center px-4 py-12">
        <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md border border-gray-200">
            <h2 class="text-3xl font-bold mb-6 text-center text-blue-700">Create an Account</h2>

            @if ($errors->any())
                <div class="mb-4 text-red-600 text-sm">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" id="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>

                <div>
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition-all duration-200">
                        Register
                    </button>
                </div>
            </form>

            <p class="mt-6 text-center text-sm text-gray-600">
                Already have an account?
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login here</a>
            </p>
        </div>
    </main>

    <!-- Footer -->
    <footer class="text-center py-4 text-sm text-gray-500">
        &copy; {{ date('Y') }} RestroApp. All rights reserved.
    </footer>

</body>
</html>
