<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use  App\Models\Product;
use  App\Models\Client;
use  App\Models\Order;


class Cart extends Model
{
    protected $fillable = ['client_id', 'product_id', 'quantity'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
   
}
