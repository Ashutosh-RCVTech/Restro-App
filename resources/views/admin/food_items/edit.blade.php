    @extends('layouts.admin')

    @section('content')
        <h2 class="text-xl font-bold mb-4">Edit Food Item</h2>

        <form action="{{ route('admin.food_items.update', $foodItem->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label>Name</label>
                <input type="text" name="name" class="form-input" value="{{ $foodItem->name }}" required>
            </div>

            <div class="mb-4">
                <label>Category</label>
                <select name="category_id" class="form-select" required>
                    @foreach(\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $foodItem->category_id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label>Price</label>
                <input type="number" name="price" class="form-input" step="0.01" value="{{ $foodItem->price }}" required>
            </div>

            <div class="mb-4">
                <label>Description</label>
                <textarea name="description" class="form-textarea">{{ $foodItem->description }}</textarea>
            </div>

            <div class="mb-4">
                <label>Current Image</label><br>
                @if ($foodItem->image)
                    <img src="{{ asset('storage/' . $foodItem->image) }}" class="w-24 h-24 object-cover rounded mb-2">
                @else
                    <p class="text-gray-500">No image uploaded</p>
                @endif
            </div>
        
            <div class="mb-4">
                <label>Change Image</label>
                <input type="file" name="image" class="form-input">
            </div>        

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    @endsection
