<?php

namespace App\Models;
use  App\Models\Product;
use  App\Models\Client;

use Illuminate\Database\Eloquent\Model;

class ProductFavorite extends Model
{
    protected $fillable = ['client_id', 'product_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
