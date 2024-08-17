<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Retrieve the authenticated user's ID
        $customer_id = Auth::id();

        // Fetch the product from the database
        $product = Product::findOrFail($request->product_id);

        // Check if the product has enough stock
        if ($product->stock < $request->quantity) {
            return response()->json(['error' => 'Insufficient stock'], 400);
        }

        // Calculate the total price
        $total_price = $product->price * $request->quantity;

        // Create the order
        $order = Order::create([
            'customer_id' => $customer_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price' => $total_price,
        ]);

        // Reduce the stock of the product
        $product->decrement('stock', $request->quantity);

        return response()->json(['success' => 'Order placed successfully', 'order' => $order]);
    }
}
