<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Models\QuestionTranslation;
class Question extends Model implements  TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['answer', 'question'];
    protected $fillable = [ 'id', 'admin_id','created_at', 'updated_at'];
    
}
