@extends('layouts.admin')

@section('content')
<div class="p-4">
    <h1 class="text-xl font-semibold mb-4">Create Category</h1>
    <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label>Name</label>
            <input name="name" type="text" class="w-full border rounded p-2" required>
        </div>
        <div>
            <label>Description</label>
            <textarea name="description" class="w-full border rounded p-2"></textarea>
        </div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Save</button>
    </form>
</div>
@endsection
