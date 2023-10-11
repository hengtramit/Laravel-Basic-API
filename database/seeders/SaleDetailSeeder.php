<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SaleDetail;

class SaleDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 100; $i++) {
            $saleDetail = new SaleDetail();
            $saleDetail->product_id = rand(1, 100);
            $saleDetail->sale_id = rand(1, 100);
            $saleDetail->price = rand(500, 1000);
            $saleDetail->qty = rand(1, 20);
            $saleDetail->product_name = "Product $i";
            $saleDetail->save();
        }
    }
}
