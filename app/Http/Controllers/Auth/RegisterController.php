<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

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
    //protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo()
    {
        if (Auth::user()->hasRole('admin')) {
            return $this->redirectTo = route('admin.users.index');
        }
        return '/home';
    }

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
            'phone' => 'required|numeric|regex:/[0-9]{10}/',
            'company_name' => ['required', 'string', 'max:255'],
            //'company_address' => ['required', 'string', 'max:255'],
            //'ZIPcode' => ['required', 'string', 'max:10'],
            //'city' => ['required', 'string', 'max:255'],
            //'country' => ['required', 'string', 'max:255'],
            'type_company_user' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        $user = User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'company_name' => $data['company_name'],
            //'company_address' => $data['company_address'],
            //'zip_code' => $data['ZIPcode'],
            //'city' => $data['city'],
            //'country' => $data['country'],
            'type_company_user' => $data['type_company_user'],

            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->roles()->attach(3);

        return $user;
    }
}
