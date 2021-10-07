<?php

namespace App\Http\Controllers\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserLocation extends Controller
{
    public function userLocation(){
        return response()->json(UserLocation::get(),200);
    }
}
