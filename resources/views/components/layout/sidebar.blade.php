<aside class="w-64 bg-blue-800 text-white min-h-screen p-6 space-y-4">
    <h2 class="text-2xl font-semibold">Menu</h2>

    <nav class="flex flex-col space-y-2">
        @php
            $dashboardRoute = Auth::user()->role === 'admin' ? 'admin.dashboard' : 'customer.dashboard';
        @endphp

        <a href="{{ route($dashboardRoute) }}" class="hover:bg-blue-700 p-2 rounded">Dashboard</a>

        @if(Auth::user()->role === 'admin')
            <a href="{{ route('admin.categories.index') }}" class="hover:bg-blue-700 p-2 rounded">Manage Categories</a>
            <a href="{{ route('admin.food_items.index') }}" class="hover:bg-blue-700 p-2 rounded">Manage Food Items</a>
            <a href="#" class="hover:bg-blue-700 p-2 rounded">Manage Users</a>
            <a href="#" class="hover:bg-blue-700 p-2 rounded">Inventory</a>
        @elseif(Auth::user()->role === 'customer')
            <a href="{{ route('customer.categories.index') }}" class="hover:bg-blue-700 p-2 rounded">Browse Categories</a>
            <a href="{{ route('customer.food_items.index') }}" class="hover:bg-blue-700 p-2 rounded">Browse Food Items</a>
            <a href="#" class="hover:bg-blue-700 p-2 rounded">My Orders</a>
        @endif
    </nav>
</aside>
