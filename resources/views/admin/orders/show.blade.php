@extends('layouts.admin')

@section('content')
    <h2 class="text-xl font-bold mb-4">Order #{{ $order->id }}</h2>

    <form method="POST" action="{{ route('admin.orders.update', $order->id) }}" class="bg-white shadow rounded p-6 mb-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-medium">Status</label>
            <select name="status" class="form-select mt-1 block w-full">
                @foreach(['pending', 'preparing', 'ready', 'completed'] as $status)
                    <option value="{{ $status }}" {{ $order->status === $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Payment Status</label>
            <select name="payment_status" class="form-select mt-1 block w-full">
                <option value="unpaid" {{ $order->payment_status === 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                <option value="paid"   {{ $order->payment_status === 'paid'   ? 'selected' : '' }}>Paid</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update Order</button>
    </form>

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
