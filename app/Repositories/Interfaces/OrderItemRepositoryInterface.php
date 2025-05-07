<?php

namespace App\Repositories\Interfaces;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

interface OrderRepositoryInterface
{
    public function createMany(array $data): bool;
    public function getbyOrderId($orderId): ?Order;
}