<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Models\ProductStoreTranslation;
use App\Models\ProductDepartment;
class ProductStore extends Model
{
    use Translatable;
    public $translatedAttributes = ['name','desc'];
    protected $fillable = [ 'id','admin_id','photo','created_at', 'updated_at'];
    public function productDepartment()
    {
        return $this->belongsTo(ProductDepartment::class);
    }
}
