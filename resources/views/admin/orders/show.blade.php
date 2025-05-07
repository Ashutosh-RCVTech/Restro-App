@extends('layouts.admin')

@section('content')
    <h2 class="text-xl font-bold mb-4">Order #{{ $order->id }}</h2>

    <form method="POST" action="{{ route('admin.orders.update', $order->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label>Status:</label>
            <select name="status" class="form-select">
                @foreach(['pending', 'preparing', 'ready', 'completed'] as $status)
                    <option value="{{ $status }}" {{ $order->status === $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label>Payment Status:</label>
            <select name="payment_status" class="form-select">
                <option value="unpaid" {{ $order->payment_status === 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                <option value="paid" {{ $order->payment_status === 'paid' ? 'selected' : '' }}>Paid</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Order</button>
    </form>

    <h3 class="text-lg font-semibold mt-6 mb-2">Items</h3>
    <ul class="list-disc ml-6">
        @foreach($order->orderItems as $item)
            <li>{{ $item->foodItem->name }} (x{{ $item->quantity }}) - ${{ $item->price }}</li>
        @endforeach
    </ul>
@endsection
