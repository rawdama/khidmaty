<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

use  App\Models\Store;
class RatingStore extends Model
{
    protected $fillable = ['client_id', 'store_id','rating', 'comment'];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

}
