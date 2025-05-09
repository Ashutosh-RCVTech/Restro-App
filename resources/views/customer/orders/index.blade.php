@extends('layouts.customer')

@section('content')
    <h2 class="text-xl font-bold mb-4">Your Orders</h2>

    <div class="space-y-4">
        @forelse($orders as $order)
            <div class="bg-white shadow rounded p-4 flex justify-between items-center">
                <div>
                    <p><strong>Order #{{ $order->id }}</strong></p>
                    <p>Status: {{ ucfirst($order->status) }}</p>
                    <p>Payment: {{ ucfirst($order->payment_status) }}</p>
                </div>
                <a href="{{ route('customer.orders.show', $order->id) }}" class="text-blue-500 hover:underline">View Details</a>
            </div>
        @empty
            <p>You have no orders yet.</p>
        @endforelse
    </div>
@endsection
