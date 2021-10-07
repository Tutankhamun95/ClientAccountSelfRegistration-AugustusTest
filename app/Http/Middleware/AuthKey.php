<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Adding the code below will allow us to use an Auth Token. Uncomment and use the token in API Calls.
        
        // $token = $request->header('APP_KEY');
        // if($token != 'ABCDEFGHIJK'){
        //     return response()->json(['message' => 'App key not found'], 401);
        // }
        return $next($request);
    }
}
