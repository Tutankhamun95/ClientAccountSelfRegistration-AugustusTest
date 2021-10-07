<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Http\Controllers\Client;

class ClientModel extends Model
{
    protected $table = "client";

    public function user()
    {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }

    protected $fillable = [
        // 'client_id',
        'client_name',
        'address1',
        'address2',
        'city',
        'state',
        'country',
        'longitude',
        'latitude',
        'phone_no1',
        'phone_no2',
        'zip',
        'start_validity',
        'end_validity',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
