<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use App\Models\User;
use App\Models\ClientModel;
use Geocoder;



use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{


    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['string', 'max:255'],
            'phone' => ['string', 'max:255'],
            'profile_uri' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    
    
     protected function create(array $data)
    {
        $loc = Geocoder::getCoordinatesForAddress($data['address1']);
        extract($loc);


        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'profile_uri' => $data['profile_uri'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'last_password_reset'=>date("Y-m-d H:i:s"),
        ]);

        $user->client = ClientModel::create([
            'client_id' => $user->id,
            'client_name'=>$user->first_name,
            'address1'=>$formatted_address,
            'longitude'=>$lng,
            'latitude'=>$lat,
            'phone_no1'=>$user->phone,
            'profile_uri' => $user->profile_uri,
            'start_validity'=>date("Y-m-d H:i:s"),
            'end_validity'=>date("Y-m-d H:i:s", strtotime("'Y-m-d H:i:s'" . " + 15 Days")),
            

        ]);

        

        return $user;
    }

    


}


