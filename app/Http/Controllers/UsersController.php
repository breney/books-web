<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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

        if(Auth::attempt($user_data)){
            return view('pages.about');
        }else{
            return view('auth.login');

        }
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
            'password' => request()->get('password'),
            'permission' => 0
            ]);
        return view('pages.about');

    }

    function logout(){
        Auth::logout();
        return view('auth.login');
    }

}
