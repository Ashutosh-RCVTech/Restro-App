<?php

namespace App\Repositories;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Interfaces\OrderItemRepositoryInterface;

class OrderItemRepository implements OrderItemRepositoryInterface
{
    public function create(array $data): OrderItem
    {
        return OrderItem::create($data);
    }

    public function createMany(array $data): bool
    {
        return OrderItem::insert($data); // assumes bulk safe
    }

    public function getByOrderId($orderId): Collection
    {
        return OrderItem::where('order_id', $orderId)->with('foodItem')->get();
    }

    public function getById($id): ?OrderItem
    {
        return OrderItem::with('foodItem')->find($id);
    }
}
