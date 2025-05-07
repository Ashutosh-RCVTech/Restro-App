<?php

namespace App\Services;

use App\Models\FoodItem;
use App\Repositories\Interfaces\FoodItemRepositoryInterface;
use App\Services\Interfaces\FoodItemServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class FoodItemService implements FoodItemServiceInterface
{
    protected $foodItemRepository;

    public function __construct(FoodItemRepositoryInterface $foodItemRepository)
    {
        $this->foodItemRepository = $foodItemRepository;
    }

    public function getAllFoodItems(): Collection
    {
        return $this->foodItemRepository->getAllFoodItems();
    }

    public function find($id): ?FoodItem
    {
        return $this->foodItemRepository->find($id);
    }

    public function create(array $data): FoodItem
    {
        return $this->foodItemRepository->create($data);
    }

    public function update($id, array $data): FoodItem
    {
        return $this->foodItemRepository->update($id, $data);
    }

    public function delete($id): bool
    {
        return $this->foodItemRepository->delete($id);
    }

    public function getFoodItemsByCategory($categoryId): Collection
    {
        return $this->foodItemRepository->getFoodItemsByCategory($categoryId);
    }

    public function getFoodItemByName($name): ?FoodItem
    {
        return $this->foodItemRepository->getFoodItemByName($name);
    }
}