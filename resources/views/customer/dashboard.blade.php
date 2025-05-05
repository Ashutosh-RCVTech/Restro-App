<!-- resources/views/admin/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Custoner Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <h2 class="text-xl font-bold text-blue-700">Custoner Dashboard</h2>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                Logout
            </button>
        </form>
    </header>

    <main class="p-6">
        <!-- Dashboard content goes here -->
        <p>Welcome, {{ Auth::user()->name }}</p>
    </main>
</body>
</html>
