<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




// Step 1 - Setting up Routes after creating Country & User Controllers

Route::post('user', 'User\UserController@userSave');

Route::get('country', 'Country\CountryController@country');
Route::get('user', 'User\UserController@user');
// Route::get('users', 'User\UserController@user');
Route::get('client', 'Client\ClientController@client');