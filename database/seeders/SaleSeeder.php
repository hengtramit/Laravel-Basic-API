<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sale;
use Illuminate\Support\Carbon;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 100; $i++) {
            $sale = new Sale();
            $sale->date = $random = Carbon::today()->subDays(rand(0, 365));;
            $sale->total_amount = rand(1000, 10000);
            $sale->save();
        }
    }
}
