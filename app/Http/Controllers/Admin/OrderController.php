<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\OrderServiceInterface;
use App\Http\Middleware\AdminMiddleware;

class OrderController extends Controller
{
    protected $orderService;
    public function __construct(OrderServiceInterface $orderSerrvoce)
    {
        $this->middleware(['auth', AdminMiddleware::class]);
        $this->orderService = $orderSerrvoce;
    }
    public function index(Request $request)
    {
        $orders = $this->orderService->getOrdersForAdmin();
        return view('admin.orders.index', compact('orders'));
    }
    public function show($id)
    {
        $order = $this->orderService->find($id);
        if (!$order) {
            return redirect()->route('admin.orders.index')->with('error', 'Order not found');
        }
        return view('admin.orders.show', compact('order'));
    }
    public function update(Request $request, $id)
    {
        $order = $this->orderService->find($id);
        if (!$order) {
            return redirect()->route('admin.orders.index')->with('error', 'Order not found');
        }
        $data = $request->validate([
            'status' => 'required|string|max:255',
            "payment_status" => 'required|string|max:255',
        ]);
        $this->orderService->updateOrder($id, $data);
        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully');
    }
}