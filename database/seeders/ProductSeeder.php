<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 100; $i++) {
            $product = new Product();
            $product->name = "Product $i";
            $product->price = rand(500, 1000);
            $product->cost = rand(50, 499);
            $product->category_id = rand(1, 100);
            $product->save();
        }
    }
}
