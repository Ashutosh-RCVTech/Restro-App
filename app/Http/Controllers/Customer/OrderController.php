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
            'items.*.selected' => 'required|in:1', // ← updated
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $orderData = [
            'customer_id' => Auth::id(),
            'status' => 'pending',
            'payment_status' => 'unpaid',
        ];

        $itemsToInsert = [];

        foreach ($validated['items'] as $foodItemId => $itemData) {
            if (isset($itemData['selected']) && $itemData['selected'] == '1') {
                $foodItem = FoodItem::find($foodItemId);
                if ($foodItem) {
                    $itemsToInsert[] = [
                        'food_item_id' => $foodItem->id,
                        'quantity' => $itemData['quantity'],
                        'price' => $foodItem->price,
                    ];
                }
            }
        }

        if (empty($itemsToInsert)) {
            return back()->with('error', 'No valid items selected.');
        }

        $this->orderService->placeOrder($orderData, $itemsToInsert);

        return redirect()->route('customer.orders.index')->with('success', 'Your order has been placed successfully.');
    }

}
