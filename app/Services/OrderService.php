<?php

namespace App\Services;

use App\Models\Order;  
use App\Models\OrderItem;
use App\Models\FoodItem;    
use App\Services\Interfaces\OrderServiceInterface;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Repositories\Interfaces\OrderItemRepositoryInterface;


class OrderService implements OrderServiceInterface
{
    protected $orderRepository;
    protected $orderItemRepository;

    public function __construct(OrderRepositoryInterface $orderRepository, OrderItemRepositoryInterface $orderItemRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->orderItemRepository = $orderItemRepository;
    }

    public function placeOrder(array $data, array $items): Order
    {
        // Create the order
        $order = $this->orderRepository->create($data);

        // Create the order items
        foreach ($items as $item) {
            $item['order_id'] = $order->id; // Set the order_id for each item
            $this->orderItemRepository->create($item);
        }

        return $order;
    }

    public function getOrdersForAdmin(): array
    {
        return $this->orderRepository->getAllOrders()->toArray();
    }

    public function getOrdersForCustomer($customerId): array
    {
        return $this->orderRepository->getOrdersByCustomer($customerId)->toArray();
    }

    public function updateOrder($id, array $data): Order
    {
        return $this->orderRepository->update($id, $data);
    }

    public function find($id): ?Order
    {
        return $this->orderRepository->find($id);
    }

    public function updateStatus($id, $status): bool
    {
        return $this->orderRepository->update($id, ['status' => $status]) ? true : false;
    }

    public function updatePaymentStatus($id, $status): bool
    {
        return $this->orderRepository->update($id, ['payment_status' => $status]) ? true : false;
    }


    // public function store(array $data): Order
    // {
    //     return $this->orderRepository->create($data);
    // }
}