<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\OrderServiceInterface;
use App\Models\FoodItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Http\Middleware\CustomerMiddleware;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderServiceInterface $orderService)
    {
        $this->middleware(['auth', CustomerMiddleware::class]);
        $this->orderService = $orderService;
    }

    // Display all orders for a customer
    public function index(Request $request)
    {
        $orders = $this->orderService->getOrdersForCustomer($request->user()->id);
        return view('customer.orders.index', compact('orders'));
    }

    // Show specific order
    public function show($id)
    {
        $order = $this->orderService->find($id);
        if (!$order) {
            return redirect()->route('customer.orders.index')->with('error', 'Order not found');
        }
        return view('customer.orders.show', compact('order'));
    }

    // Handle order placement
    public function store(Request $request)
    {
        $validated = $request->validate([
            'items' => 'required|array',
            'items.*.selected' => 'required|boolean',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $orderData = [
            'customer_id' => Auth::id(),
            'status' => 'pending',  // Default status
            'payment_status' => 'unpaid',  // Default payment status
        ];

        // Create the order first
        $order = Order::create($orderData);

        // Add selected items to the order
        foreach ($validated['items'] as $foodItemId => $itemData) {
            if ($itemData['selected'] == 1) {
                $foodItem = FoodItem::find($foodItemId);

                // Create an OrderItem for each selected food item
                if ($foodItem) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'food_item_id' => $foodItem->id,
                        'quantity' => $itemData['quantity'],
                        'price' => $foodItem->price,  // Store price in OrderItem
                    ]);
                }
            }
        }

        // Redirect to the customer's orders page
        return redirect()->route('customer.orders.index')->with('success', 'Your order has been placed successfully.');
    }
}
