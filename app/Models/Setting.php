<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Models\SettingTranslation;

class Setting extends Model
{
    //
    use Translatable;
    public $translatedAttributes = ['name','address','Currency','terms_policies','privacy_policy','about','who_we_are'];
    protected $fillable = [ 'id','admin_id','phone-1','phone-2','twitter_link','facebook_link',
    'instagram_link','snapchat_link','linkedin_link','youtube_link','whatsapp_link','app_store_link',
    'google_play_link','header_logo','footer_logo','footer_logo','favicon','about_image',
    'created_at', 'updated_at'];

}
