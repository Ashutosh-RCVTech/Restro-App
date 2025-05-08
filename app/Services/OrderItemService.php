<?php

namespace App\Services;

use App\Models\OrderItem;
use App\Repositories\Interfaces\OrderItemRepositoryInterface;
use App\Services\Interfaces\OrderItemServiceInterface;

class OrderItemService implements OrderItemServiceInterface
{
    protected $orderItemRepository;

    public function __construct(OrderItemRepositoryInterface $orderItemRepository)
    {
        $this->orderItemRepository = $orderItemRepository;
    }

    public function create(array $data): OrderItem
    {
        return $this->orderItemRepository->create($data);
    }

    public function getByOrderId($orderId)
    {
        return $this->orderItemRepository->getByOrderId($orderId);
    }

    public function getById($id): ?OrderItem
    {
        return $this->orderItemRepository->getById($id);
    }
}
