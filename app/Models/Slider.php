<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Models\QuestionTranslation;

class Slider extends Model
{
    use Translatable;
    public $translatedAttributes = ['name', 'desc'];
    protected $fillable = [ 'id', 'admin_id','created_at','type','location','photo','link', 'updated_at'];
}
