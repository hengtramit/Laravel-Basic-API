<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SaleDetail;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'sale_id', 'price', 'qty', 'product_name'];
    public function saleDetails() {
        return $this->hasMany(SaleDetail::class);
    }
}
