<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
    protected $fillable=[
        'name',
        'phone',
        'email',
        'password',
        'permissions'
    ];
    public function getPermissionsAttribute($value)
    {
        return json_decode($value, true);
    }
}
