<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Models\OpnionTranslation;

class Opnion extends Model
{
    use Translatable;
    public $translatedAttributes = ['name','comment'];
    protected $fillable = [ 'id','admin_id','created_at', 'updated_at'];

}
