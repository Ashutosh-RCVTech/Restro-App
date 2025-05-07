@extends('layouts.customer')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Available Food Items</h1>

    <form action="{{ route('customer.orders.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse ($foodItems as $item)
                <div class="bg-white rounded shadow p-4">
                    <label class="block">
                        <input type="checkbox" name="items[{{ $item->id }}][selected]" value="1" class="mr-2">
                        <strong>{{ $item->name }}</strong>
                    </label>

                    <img src="{{ asset('storage/' . $item['image']) }}" class="w-24 h-24 object-cover rounded mb-2">
                    <p class="text-gray-600">{{ $item->description }}</p>
                    <p class="text-blue-800 font-bold mt-2">${{ number_format($item->price, 2) }}</p>

                    <label class="block mt-2">
                        Quantity:
                        <input type="number" name="items[{{ $item->id }}][quantity]" value="1" min="1" class="form-input mt-1 w-full">
                    </label>
                </div>
            @empty
                <p>No food items available.</p>
            @endforelse
        </div>

        @if(count($foodItems))
            <div class="mt-6">
                <button type="submit" class="btn btn-primary px-4 py-2 bg-blue-600 text-white rounded">Place Order</button>
            </div>
        @endif
    </form>
@endsection
