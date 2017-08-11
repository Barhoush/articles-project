<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Monarobase\CountryList\CountryList;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Request;
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
    protected $redirectTo = '/home';

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' =>  'required',
            'country'   =>  'required|string'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'country' => $data['country'],
            'phone' => $data['phone']
        ]);
    }

    public function showRegistrationForm()
    {
        $userCountry = $this ->  getUserCountry();
        $countriesList  =   new CountryList();
        $countriesList  =   $countriesList->getList('en', 'php');
        return view('auth.register')
            ->with('userCountry',   $userCountry)
            ->with('countriesList', $countriesList)
            ;
    }
    /**
     * Get real Country Name using client ip address
     *
     * @return string
     */
    public function getUserCountry()
    {
        $ip =   Request::ip();
        if($ip  ==  '127.0.0.1'){
            //considering anyone uses this project from his local machine is a palestinian :)
            return  'PS';
        }
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        //get ISO2 country code
        if(property_exists($ipdat, 'geoplugin_countryCode')) {
            return $ipdat->geoplugin_countryCode;
        }
        return 'Unknown';
    }
}
