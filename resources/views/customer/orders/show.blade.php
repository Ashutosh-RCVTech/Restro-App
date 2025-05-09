@extends('layouts.customer')

@section('content')
    <h2 class="text-xl font-bold mb-4">Order #{{ $order->id }}</h2>

    <div class="bg-white shadow rounded p-6 mb-6">
        <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
        <p><strong>Payment Status:</strong> {{ ucfirst($order->payment_status) }}</p>
    </div>

    <h3 class="text-lg font-semibold mb-2">Items</h3>
    <ul class="bg-white shadow rounded divide-y">
        @foreach($order->items as $item)
            <li class="flex justify-between px-6 py-4">
                <span>{{ $item->foodItem->name }} (x{{ $item->quantity }})</span>
                <span>${{ number_format($item->price * $item->quantity, 2) }}</span>
            </li>
        @endforeach
    </ul>
@endsection
