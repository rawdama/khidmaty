<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use  App\Models\Product;
use  App\Models\Store;
class Rating extends Model
{
    protected $fillable = ['client_id', 'store_id','product_id', 'rating', 'comment'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
