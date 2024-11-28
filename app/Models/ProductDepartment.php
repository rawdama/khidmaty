<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Models\roductDepartmentTranslation;
use App\Models\ProductStore;
class ProductDepartment extends Model
{
    use Translatable;
    public $translatedAttributes = ['name'];
    protected $fillable = [ 'id','admin_id','product_store_id','photo','created_at', 'updated_at'];
    public function productStore()
    {
        return $this->hasOne(ProductStore::class);
    }
}
