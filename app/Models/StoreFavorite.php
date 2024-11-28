<?php

namespace App\Models;
use App\Models\Client;
use App\Models\Store;
use Illuminate\Database\Eloquent\Model;

class StoreFavorite extends Model
{
    protected $fillable = ['client_id', 'store_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
