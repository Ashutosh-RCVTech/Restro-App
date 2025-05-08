<?php

namespace App\Repositories\Interfaces;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

interface OrderRepositoryInterface
{
    public function create(array $data): OrderItem; // single item creation
    public function createMany(array $data): bool;  // if needed in future
    public function getByOrderId($orderId): Collection; // all items in an order
    public function getById($id): ?OrderItem;

}