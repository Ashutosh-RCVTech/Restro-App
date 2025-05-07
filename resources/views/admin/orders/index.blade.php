@extends('layouts.admin')

@section('content')
    <h2 class="text-xl font-bold mb-4">All Orders</h2>

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Status</th>
                <th>Payment</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer->name ?? 'N/A' }}</td>
                    <td>{{ ucfirst($order->status) }}</td>
                    <td>{{ ucfirst($order->payment_status) }}</td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="text-blue-600">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
