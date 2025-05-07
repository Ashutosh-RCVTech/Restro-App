@extends('layouts.admin')

@section('content')
<div class="p-4">
    <h1 class="text-xl font-semibold mb-4">Edit Category</h1>
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label>Name</label>
            <input name="name" type="text" class="w-full border rounded p-2" value="{{ $category->name }}" required>
        </div>
        <div>
            <label>Description</label>
            <textarea name="description" class="w-full border rounded p-2">{{ $category->description }}</textarea>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
