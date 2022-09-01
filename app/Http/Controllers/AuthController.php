<?php

namespace App\Http\Controllers;

use App\Models\filial;
use Hash;
use Illuminate\Http\Request;
use Session;
use App\Models\User;
use Auth;
use Validator;


class AuthController extends Controller
{
    public function indexRegister(){
        return view('auth-index.auth-register');
    }
    public function createRegister(Request $request){
        $data = [];
        Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'filial_id'=>['required','string','max:255'],
            'role'=>['required'],
            'guest'=>['string','max:255']
        ]);
        Session::put('guestUser',[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ]);
        // dd(Session::get('guestUser'));
        return view('filial.newFilial');
    }
    public function newFilial(Request $request){
        // validate
        $newUser = Session::get('guestUser');
        $user = User::create([
            'name'=>$newUser['name'],
            'email'=>$newUser['email'],
            'password'=>Hash::make($newUser['password']),
            'role'=>'DIRECTOR',
            'parent_user_id'=>0
        ]);
        if($user){
            Session::put('user',[
                'name'=>$user->name,
                'email'=>$user->email,
                'role'=>$user->role,
            ]);
            // dd(Auth::user());
            $filial = filial::create([
                'name'=>$request->name,
                'description'=>$request->description,
                'user_id'=>$user->id
            ]);
            if($filial){
                $request->expectsJson(null);
                return redirect('/home');
            }
        }
    }
}
