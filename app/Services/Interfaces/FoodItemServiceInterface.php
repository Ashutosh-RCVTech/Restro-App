<?php

namespace App\Services\Interfaces;

use App\Models\FoodItem;
use Illuminate\Database\Eloquent\Collection;

interface FoodItemServiceInterface
{
    public function getAllFoodItems(): Collection;
    public function find($id): ?FoodItem;
    public function create(array $data): FoodItem;
    public function update($id, array $data): FoodItem;
    public function delete($id): bool;
    public function getFoodItemsByCategory($categoryId): Collection;
    public function getFoodItemByName($name): ?FoodItem;
}