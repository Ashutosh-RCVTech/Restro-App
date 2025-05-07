<?php

namespace App\Repositories\Interfaces;

use App\Models\FoodItem;
use Illuminate\Database\Eloquent\Collection;

interface FoodItemRepositoryInterface
{
    public function getAllFoodItems(): Collection;
    public function find($id): ?FoodItem;
    public function create(Array $data): FoodItem;
    public function update($id, Array $data): FoodItem;
    public function delete($id): bool;
    public function getFoodItemsByCategory($categoryId): Collection;
    public function getFoodItemByName($name): ?FoodItem;
}
