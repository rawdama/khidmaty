<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Models\ProductTypeTranslation;
class ProductType extends Model
{
    use Translatable;
    public $translatedAttributes = ['name'];
    protected $fillable = [ 'id','admin_id','photo','created_at', 'updated_at'];
}
