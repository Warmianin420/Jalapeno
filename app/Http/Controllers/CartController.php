<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\Pepper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Wyświetlanie koszyka.
     */
    public function index()
    {
        $cartItems = CartItem::with('pepper')->where('user_id', Auth::id())->get();
        return view('cart.index', compact('cartItems'));
    }

    /**
     * Dodanie produktu do koszyka.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pepper_id' => 'required|exists:peppers,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $pepper = Pepper::find($request->pepper_id);
        if (!$pepper) {
            return redirect()->route('cart.index')->with('error', 'Wybrany produkt nie istnieje.');
        }

        // Pobierz istniejący element w koszyku, jeśli istnieje
        $cartItem = CartItem::where('user_id', Auth::id())
            ->where('pepper_id', $request->pepper_id)
            ->first();

        if ($cartItem) {
            // Jeśli towar już jest w koszyku, zwiększ jego ilość
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            // Jeśli towar nie istnieje w koszyku, dodaj go
            CartItem::create([
                'user_id' => Auth::id(),
                'pepper_id' => $pepper->id,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Produkt został dodany do koszyka.');
    }

    /**
     * Usunięcie produktu z koszyka.
     */
    public function destroy($id)
    {
        $cartItem = CartItem::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Produkt został usunięty z koszyka.');
    }

    /**
     * Finalizacja zamówienia.
     */
    public function checkout()
    {
        $cartItems = CartItem::with('pepper')->where('user_id', Auth::id())->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Koszyk jest pusty.');
        }

        $totalPrice = $cartItems->reduce(function ($total, $item) {
            return $total + ($item->pepper->price * $item->quantity);
        }, 0);

        // Utworzenie zamówień dla każdego elementu w koszyku
        foreach ($cartItems as $item) {
            Order::create([
                'user_id' => Auth::id(),
                'pepper_id' => $item->pepper->id,
                'quantity' => $item->quantity,
                'order_date' => now(),
            ]);
        }

        // Usunięcie produktów z koszyka
        CartItem::where('user_id', Auth::id())->delete();

        return redirect()->route('orders.index')->with('success', 'Zamówienie zostało złożone.');
    }
}
