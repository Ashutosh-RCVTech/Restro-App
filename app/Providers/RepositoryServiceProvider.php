<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Services\Interfaces\CategoryServiceInterface;
use App\Services\CategoryService;
use App\Repositories\Interfaces\FoodItemRepositoryInterface;
use App\Repositories\FoodItemRepository;
use App\Services\Interfaces\FoodItemServiceInterface;
use App\Services\FoodItemService;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Repositories\OrderRepository;
use App\Repositories\Interfaces\OrderItemRepositoryInterface;
use App\Repositories\OrderItemRepository;
use App\Services\Interfaces\OrderServiceInterface;
use App\Services\OrderService;
use App\Services\Interfaces\OrderItemServiceInterface;
use App\Services\OrderItemService;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Repositories
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(FoodItemRepositoryInterface::class, FoodItemRepository::class);    
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(OrderItemRepositoryInterface::class, OrderItemRepository::class);

        // Services
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);
        $this->app->bind(FoodItemServiceInterface::class, FoodItemService::class);
        $this->app->bind(OrderServiceInterface::class, OrderService::class);
        $this->app->bind(OrderItemServiceInterface::class, OrderItemService::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
