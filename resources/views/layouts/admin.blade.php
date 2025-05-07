<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex">

    <x-layout.sidebar />

    <div class="flex-1">
        <x-layout.header />
        <main class="p-6">
            @yield('content')  <!-- This is what matches your @section('content') -->
        </main>
    </div>

</body>
</html>