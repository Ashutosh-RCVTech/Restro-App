<header class="bg-white shadow px-6 py-4 flex justify-between items-center">
    <h1 class="text-xl font-bold text-blue-700">🍽️ RestroApp</h1>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600">
            Logout
        </button>
    </form>
</header>
