@extends('layouts.customer')

@section('content')
<div class="p-4">
    <h1 class="text-2xl font-semibold mb-4">Available Categories</h1>
    <div class="grid grid-cols-1 gap-4">
        @foreach($categories as $category)
            <div class="bg-white shadow p-4 rounded">
                <h2 class="text-lg font-bold">{{ $category->name }}</h2>
                <p>{{ $category->description }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
