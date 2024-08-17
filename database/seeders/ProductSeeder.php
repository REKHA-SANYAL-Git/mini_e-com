<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Create two products
        Product::create([
            'name' => 'Product 1',
            'description' => 'Description for Product 1',
            'price' => 100.00, // Set the price
            'stock' => 50, // Set the initial stock
        ]);

        Product::create([
            'name' => 'Product 2',
            'description' => 'Description for Product 2',
            'price' => 150.00, // Set the price
            'stock' => 30, // Set the initial stock
        ]);
    }
}
