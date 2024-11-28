<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Models\ProductType;
use App\Models\Store;
use App\Models\ProductDepartment;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Rating;
use  App\Models\OrderItem;
use  App\Models\Cart;

class Product extends Model
{
    use Translatable;

    public $translatedAttributes = ['name', 'desc'];

    protected $fillable = [
        'id',
        'product_type_id',
        'store_id',
        'product_department_id',
        'brand_id',
        'car_id',
        'type',
        'model',
        'offer',
        'offer_description',
        'offer_type',
        'offer_value',
        'from_date',
        'to_date',
        'created_at',
        'updated_at',
        'photo',
        'price',
        'final_price',
        'code',
        
    ];

    // Relationship with ProductType
    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }

    // Relationship with Store
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    // Relationship with ProductDepartment
    public function productDepartment()
    {
        return $this->belongsTo(ProductDepartment::class);
    }

    // Relationship with Brand
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

   
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function averageRating()
    {
        return $this->ratings()->avg('rating');
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

}