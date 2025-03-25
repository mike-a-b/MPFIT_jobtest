<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    /**
     * Display a form to create order
     */
    public function create()
    {
//        dd("test");
        $products = Product::all();
        return view('orders.create', compact('products'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fio' => 'required|string|max:255',
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1|max:99',
            'comment' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
        ]);
        $order = new Order($validated);
        $order->save();
        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $products = Product::all();
        return view('orders.show', compact('order', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'nullable|boolean',
        ]);

        isset($validated['status']) ? $validated['status'] = 1 : $validated['status'] = 0;
        $order->update($validated);

        return redirect(route('orders.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index');
    }
}
