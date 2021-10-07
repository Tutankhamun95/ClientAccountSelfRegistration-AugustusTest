<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientModel;
use App\Models\User;


class ClientController extends Controller
{
    public function client(){
return response()->json(User::join('client', 'users.id', '=', 'client.id')
        ->get(['users.*', 'client.*']), 200);   
    
    }

}
