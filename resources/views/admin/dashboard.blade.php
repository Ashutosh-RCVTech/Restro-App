<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css') <!-- Use Vite instead of CDN for Tailwind -->
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="flex">
        <!-- Include the sidebar component -->
        <x-layout.sidebar />

        <div class="flex-1">
            <header class="bg-white shadow-md p-4 flex justify-between items-center">
                <h2 class="text-xl font-bold text-blue-700">Admin Dashboard</h2>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                        Logout
                    </button>
                </form>
            </header>

            <main class="p-6">
                @yield('content') <!-- This should be yield, not section -->
                <p>Welcome, {{ Auth::user()->name }}</p>
            </main>
        </div>
    </div>
</body>
</html>