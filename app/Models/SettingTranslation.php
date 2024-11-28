<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingTranslation extends Model
{
    protected $fillable=['name','address','Currency','terms_policies','privacy_policy','about','who_we_are'];
   
}
