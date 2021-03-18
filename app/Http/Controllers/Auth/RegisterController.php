<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Typology;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Rules\IsValidPassword;

class RegisterController extends Controller
{
    
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
        $this -> middleware('guest');
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

            'name' => ['required', 'string', 'min:3','max:20'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed', new isValidPassword()],
            'address' => ['required', 'string', 'min:2', 'max:50'],
            'city' => ['required'],
            'IVA' => ['required', 'numeric', 'digits_between:11,11'], 
            'day_off' => ['required', 'alpha','min:6', 'max:9'],
            'logo' => ['required'],
            'typologies' => ['required']
        ]);
    }

    public function showRegistrationForm()
    {
        $typologies = Typology::all();
        //dd($typologies);
        return view('auth.register', compact('typologies'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data) {   
        $typologies = Typology::findOrFail($data['typologies']);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'city' => $data['city'],
            'IVA' => $data['IVA'],
            'day_off' => $data['day_off'],
            'logo' => $data['logo']
        ]);
        
        $user -> typologies() -> attach($typologies);
        return $user;
        
    } 


}


