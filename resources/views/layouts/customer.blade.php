<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex">
    <x-layout.sidebar />
    <div class="flex-1">
        <x-layout.header />
        <main class="p-6">
            {{-- {{ $slot }} --}}  <!-- Commented out slot -->
            @yield('content')     <!-- Active yield directive -->
        </main>
    </div>
</body>
</html>