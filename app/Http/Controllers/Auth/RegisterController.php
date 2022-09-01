<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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
        // $this->middleware('guest');
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
            'filial_id'=>['required','string','max:255'],
            'role'=>['required'],
            'guest'=>['string','max:255']
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
        if($data['guest'] === "true"){
            // $filial_id = intval($data['filial_id']);
            $parent_user_id = 0;
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'role'=>$data['role'],
                'password' => Hash::make($data['password']),
                'parent_user_id'=>$parent_user_id
            ]);
            
        }else{
            $filial_id = intval($data['filial_id']);
            $parent_user_id = Auth::user()->id;
            // dd($parent_user_id);
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'filial_id'=>$filial_id,
                'role'=>$data['role'],
                'password' => Hash::make($data['password']),
                'parent_user_id'=>$parent_user_id
            ]);
        }
    }
}
