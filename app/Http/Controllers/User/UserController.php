<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function user(){

        //MY FAILED ATTEMPT TO DECODE/PARSE THE JSON DATA FROM THE SERVER.

        // $a = new \stdClass;
        
        // $response = response()->json(User::join('client', 'users.id', '=', 'client.id')
        // ->get(['users.*', 'client.*']), 200);

        // $jsonIterator = new \RecursiveIteratorIterator(
        //     new \RecursiveArrayIterator($response),
        //     \RecursiveIteratorIterator::SELF_FIRST
        // );

        // foreach ($jsonIterator as $key => $val) {
        //     if(is_array($val)) {
        //         echo "$key:\n";
        //     } else {
        //         echo "$key => $val\n";
        //     }
        // }

        // $zeft = [

        // ];

        // return $zeft;

        return response()->json(User::get(),200);

    }

    public function userSave(Request $request){
        $user = User::create($request->all());
        return response()->json($user, 201);
    }


    protected function create(array $data)
        {
            User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'profile_uri' => $data['profile_uri'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            ]);
            return $user;
        }


}
