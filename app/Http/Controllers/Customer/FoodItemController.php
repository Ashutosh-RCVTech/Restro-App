<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\FoodItemServiceInterface;
use App\Http\Middleware\CustomerMiddleware;

class FoodItemController extends Controller
{
    protected $foodItemService;

    public function __construct(FoodItemServiceInterface $foodItemService)
    {
        $this->middleware(['auth', CustomerMiddleware::class]);
        $this->foodItemService = $foodItemService;
    }

    public function index()
    {
        $foodItems = $this->foodItemService->getAllFoodItems();
        return view('customer.food_items.index', compact('foodItems'));
    }
}
