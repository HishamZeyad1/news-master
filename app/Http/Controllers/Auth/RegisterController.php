<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            //  'usertype'=>['required', 'string'],
            //  'email_verified_at' => ['required', 'string','max:255'],
            //  'api_token' => ['required', 'string', 'max:255'],
            //  'remember_token' => ['required', 'string','max:255'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {   return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'usertype'=>'user',
        'password' => Hash::make($data['password']),
        "avatar"=>"https://source.unsplash.com/random",

        'email_verified_at' => now(),
        // 'api_token' => bin2hex( openssl_random_pseudo_bytes( 20 ) ),
        'api_token' => bin2hex(random_bytes(30)),        
        // 'api_token' => Str::random(30),
        'remember_token' => Str::random(10),
    ]);
    
    
    }
}
