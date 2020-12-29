<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;


class UsersController extends Controller
{

    function login(){
        return view('auth.login');
    }

    function register(){
        return view('auth.register');
    }

    function checkLogin(Request $request){

        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3'
        ]);

        $user_data = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];

        $users = User::where('email','=',$request->get('email'))->first();

        if(Auth::attempt($user_data)){
            if($users -> permission == 1){
                return view('admin.admin_home');
            }
            return redirect()->to('books');
        }
            return view('auth.login');

    }

    function registerUser(Request $request){

        $this->validate($request,[
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3'
        ]);


        User::create(['firstName' => request()->get('firstName'),
            'lastName' => request()->get('lastName'),
            'email' => request()->get('email'),
            'password' => Hash::make(request()->get('password')),
            'permission' => 0
            ]);

        return view('pages.about');

    }

    function logout(){
        Auth::logout();
        return redirect()->to('');
    }

}
