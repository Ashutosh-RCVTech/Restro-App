<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\FoodItemServiceInterface;
use Illuminate\Http\Request;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Storage;

class FoodItemController extends Controller
{
    protected $foodItemService;

    public function __construct(FoodItemServiceInterface $foodItemService)
    {
        $this->middleware(['auth', AdminMiddleware::class]);
        $this->foodItemService = $foodItemService;
    }

    public function index()
    {
        $foodItems = $this->foodItemService->getAllFoodItems();
        return view('admin.food_items.index', compact('foodItems'));
    }

    public function create()
    {
        return view('admin.food_items.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        try {
            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('food_images', 'public');
            }
    
            $this->foodItemService->create($validated);
            return redirect()->route('admin.food_items.index')
                   ->with('success', 'Food item created successfully.');
        } catch (\Exception $e) {
            return back()->withInput()
                   ->with('error', 'Error creating food item: '.$e->getMessage());
        }
    }
    
    public function edit($id)
    {
        $foodItem = $this->foodItemService->find($id);
        return view('admin.food_items.edit', compact('foodItem'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('food_images', 'public');
        }

        $this->foodItemService->update($id, $validated);
        return redirect()->route('admin.food_items.index')->with('success', 'Food item updated successfully.');
    }

    public function delete($id)
    {
        $this->foodItemService->delete($id);
        return redirect()->route('admin.food_items.index')->with('success', 'Food item deleted successfully.');
    }

    public function getFoodItemsByCategory($categoryId)
    {
        $foodItems = $this->foodItemService->getFoodItemsByCategory($categoryId);
        return response()->json($foodItems);
    }

    public function getFoodItemByName($name)
    {
        $foodItem = $this->foodItemService->getFoodItemByName($name);
        return response()->json($foodItem);
    }
}
