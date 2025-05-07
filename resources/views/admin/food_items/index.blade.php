@extends('layouts.admin')

@section('content')
    <h2 class="text-xl font-bold mb-4">Food Items</h2>
    <a href="{{ route('admin.food_items.create') }}" class="btn btn-primary mb-3">Create New Food Item</a>

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($foodItems as $item)
                <tr>
                    <td>
                        @if ($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" class="w-16 h-16 object-cover rounded">
                        @else
                            <span class="text-gray-500 text-sm">No image</span>
                        @endif
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>${{ number_format($item->price, 2) }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                        <a href="{{ route('admin.food_items.edit', $item->id) }}" class="text-blue-500">Edit</a> |
                        <form action="{{ route('admin.food_items.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500" onclick="return confirm('Delete this item?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
