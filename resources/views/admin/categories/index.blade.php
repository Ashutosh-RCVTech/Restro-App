@extends('layouts.admin')

@section('content')
<div class="p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold">Categories</h1>
        <a href="{{ route('admin.categories.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Add Category</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full table-auto bg-white shadow rounded">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2 text-left">Name</th>
                <th class="px-4 py-2 text-left">Description</th>
                <th class="px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td class="px-4 py-2">{{ $category->name }}</td>
                    <td class="px-4 py-2">{{ $category->description }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="text-blue-500">Edit</a>

                        <!-- Delete Form -->
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
