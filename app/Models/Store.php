<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductStore;
use App\Models\OrderItem;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Store  extends Authenticatable
{
    use  HasApiTokens; 
    protected $fillable=['id','name','email','password','countryCode','phone',
    'address','photo','Commercial_register','product_store_id'];
    public function productStore()
    {
        return $this->hasOne(ProductStore::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'store_id');
    }
}
