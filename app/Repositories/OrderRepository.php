<?php

namespace App\Repositories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

class orderRepository implements OrderRepositoryInterface
{
    public function getAllOrders(): Collection
    {
        return Order::with(['customer', 'items.foodItem'])->get();
    }

    public function find($id): ?Order
    {
        return Order::with(['customer', 'items.foodItem'])->find($id);
    }

    public function getOrdersByCustomer($customerId): Collection
    {
        return Order::where('customer_id', $customerId)->with(['customer', 'items.foodItem'])->get();
    }

    public function create(array $data): Order
    {
        return Order::create($data);
    }

    
    public function update($id, array $data): Order
    {
        $order = Order::findOrFail($id);
        $order->update($data);
        return $order;
    }
    
    public function delete($id): bool
    {
        return Order::destroy($id) > 0;
    }    
        
}