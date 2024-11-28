<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use  App\Models\OrderItem;
use  App\Models\Cart;
use  App\Models\Client;
class Order extends Model
{
    
    protected $fillable = [
        'client_id',
        'client_name',
        'address',
        'notes',
        'code',
        'payment_type',
        'delivery_method',
        'total_price',
    ];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
