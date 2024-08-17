<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class ProductController extends Controller
{
    public function index()
    {
        $products = Cache::remember('products', 60 * 60, function () {
            return Product::whereNull('deleted_at')->get(); // Only fetch products where deleted_at is null
        });


      // Return the products as a JSON response
      return response()->json([
        'success' => true,
        'data' => $products
    ]);
    }
}
