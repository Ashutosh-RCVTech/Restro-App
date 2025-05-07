<?php

namespace App\Repositories;

use App\Models\FoodItem;
use App\Repositories\Interfaces\FoodItemRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class FoodItemRepository implements FoodItemRepositoryInterface
{
    public function getAllFoodItems(): Collection
    {
        return FoodItem::with('category')->get();
    }

    public function find($id): ?FoodItem
    {
        return FoodItem::with('category')->find($id);
    }

    public function create(array $data): FoodItem
    {
        return FoodItem::create($data);
    }

    public function update($id, array $data): FoodItem
    {
        $foodItem = FoodItem::findOrFail($id);
        $foodItem->update($data);
        return $foodItem;
    }

    public function delete($id): bool
    {
        return FoodItem::destroy($id) > 0;
    }

    public function getFoodItemsByCategory($categoryId): Collection
    {
        return FoodItem::where('category_id', $categoryId)->get();
    }

    public function getFoodItemByName($name): ?FoodItem
    {
        return FoodItem::where('name', $name)->first();
    }
}