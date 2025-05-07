<?php

namespace App\Repositories\Interfaces;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

interface OrderRepositoryInterface
{
    public function getAllOrders(): Collection;
    public function find($id): ?Order;
    public function create(array $data): Order;
    public function update($id, array $data): Order;
    public function delete($id): bool;
    public function getOrdersByCustomer($customerId): Collection;
}