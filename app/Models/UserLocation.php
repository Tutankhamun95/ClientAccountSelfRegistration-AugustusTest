<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLocation extends Model
{
    protected $table = "client";

    protected $fillable = [
        
        'name',
        'dname',
        'iso3',
        'position',
        'numcode',
        'phonecode',
        'created',
        'register_by',
        'modified',
        'modified_by'
    ];
}
