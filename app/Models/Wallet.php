<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Store;
class Wallet extends Model
{
    protected $fillable = [
        'store_id',
        'name',
        'email',
        'phone',
        'total_sales',
    ];
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
