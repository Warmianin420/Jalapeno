<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Pepper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with(['user', 'pepper'])->get();
        return view('orders.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $peppers = Pepper::all();
        return view('orders.create', ['peppers' => $peppers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pepper_id' => 'required|exists:peppers,id',
            'quantity' => 'required|integer|min:1',
        ]);

        Order::create([
            'user_id' => Auth::id(),
            'pepper_id' => $request->pepper_id,
            'quantity' => $request->quantity,
            'order_date' => now(),
        ]);

        return redirect()->route('orders.index')->with('success', 'Zamówienie zostało złożone.');
    }



    /**
     * Display the specified resource.
     */ public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }



    public function edit(Order $order)
    {
        $peppers = Pepper::all();
        return view('orders.edit', ['order' => $order, 'peppers' => $peppers]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'pepper_id' => 'required|exists:peppers,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $order->pepper_id = $validatedData['pepper_id'];
        $order->quantity = $validatedData['quantity'];
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Zamówienie zostało zaktualizowane.');
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
