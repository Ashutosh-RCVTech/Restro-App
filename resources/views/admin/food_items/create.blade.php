@extends('layouts.admin')

@section('content')
    <h2 class="text-xl font-bold mb-4">Create Food Item</h2>

    <form action="{{ route('admin.food_items.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label>Name</label>
            <input type="text" name="name" class="form-input" required>
        </div>

        <div class="mb-4">
            <label>Category</label>
            <select name="category_id" class="form-select" required>
                @foreach(\App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label>Price</label>
            <input type="number" name="price" class="form-input" step="0.01" required>
        </div>

        <div class="mb-4">
            <label>Description</label>
            <textarea name="description" class="form-textarea"></textarea>
        </div>

        <div class="mb-4">
            <label>Image</label>
            <input type="file" name="image" class="form-input">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
