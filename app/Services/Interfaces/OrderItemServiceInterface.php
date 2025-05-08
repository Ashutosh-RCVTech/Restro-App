<?php

namespace App\Services\Interfaces;

use App\Models\OrderItem;

interface OrderItemServiceInterface
{
    public function create(array $data): OrderItem;
    public function getByOrderId($orderId);
    public function getById($id): ?OrderItem;
}
