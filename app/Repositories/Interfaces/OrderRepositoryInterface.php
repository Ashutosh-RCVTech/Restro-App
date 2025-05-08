<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface OrderRepositoryInterface
{
    public function getAllOrders(): Collection; // Get all orders
    public function find($id): ?Order; // Find an order by ID
    public function getOrdersByCustomer($customerId): Collection; // Get all orders for a specific customer
    public function create(array $data): Order; // Create a new order
    public function update($id, array $data): Order; // Update an existing order
    public function delete($id): bool; // Delete an order
}