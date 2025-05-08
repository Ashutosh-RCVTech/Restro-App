<?php

namespace App\Services\Interfaces;

use App\Models\Order;

interface OrderServiceInterface
{
    public function getOrdersForAdmin(): array; // Get all orders for admin
    public function getOrdersForCustomer($customerId): array; // Get all orders for a specific customer
    public function find($id): ?Order; // Find an order by ID
    public function placeOrder(array $data, array $items): Order;
    public function updateStatus($id, $status) : bool; // Update the status of an order
    public function updatePaymentStatus($id, $status) : bool; // Update the payment status of an order
    // public function store(array $data): Order;
}