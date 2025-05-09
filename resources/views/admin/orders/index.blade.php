@extends('layouts.admin')

@section('content')
    <h2 class="text-xl font-bold mb-4">All Orders</h2>

    <table class="table-auto w-full bg-white shadow rounded">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2">Order ID</th>
                <th class="px-4 py-2">Customer</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Payment</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $order->id }}</td>
                    <td class="px-4 py-2">{{ $order->customer->name ?? 'N/A' }}</td>
                    <td class="px-4 py-2">{{ ucfirst($order->status) }}</td>
                    <td class="px-4 py-2">{{ ucfirst($order->payment_status) }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="text-blue-600 hover:underline">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
