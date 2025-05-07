@extends('layouts.customer')

@section('content')
    <h2 class="text-xl font-bold mb-4">Your Orders</h2>

    @forelse($orders as $order)
        <div class="border p-4 mb-4 rounded">
            <div>Order ID: {{ $order->id }}</div>
            <div>Status: <strong>{{ ucfirst($order->status) }}</strong></div>
            <div>Payment: {{ ucfirst($order->payment_status) }}</div>
            <a href="{{ route('customer.orders.show', $order->id) }}" class="text-blue-500">View Details</a>
        </div>
    @empty
        <p>You have no orders yet.</p>
    @endforelse
@endsection
