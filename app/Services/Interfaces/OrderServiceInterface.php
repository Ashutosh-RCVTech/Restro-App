<?php

namespace App\Services\Interfaces;

use App\Models\Order;

interface OrderServiceInterface
{
    public function placeOrder(array $data, array $items): Order;
    public function getOrdersForAdmin(): array;
    public function getOrdersForCustomer($customerId): array;
    public function updateOrder($id, array $data): Order;
    public function find($id): ?Order;
    public function store(array $data): Order;
}