<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use  App\Models\Product;
use  App\Models\Order;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'store_id',
        'quantity',
        'price',
        'total_price',
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
