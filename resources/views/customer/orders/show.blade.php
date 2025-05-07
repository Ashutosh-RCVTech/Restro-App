@extends('layouts.customer')

@section('content')
    <h2 class="text-xl font-bold mb-4">Order #{{ $order->id }}</h2>

    <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
    <p><strong>Payment:</strong> {{ ucfirst($order->payment_status) }}</p>

    <h3 class="text-lg font-semibold mt-4 mb-2">Items</h3>
    <ul class="list-disc ml-6">
        @foreach($order->orderItems as $item)
            <li>{{ $item->foodItem->name }} (x{{ $item->quantity }}) - ${{ $item->price }}</li>
        @endforeach
    </ul>
@endsection
