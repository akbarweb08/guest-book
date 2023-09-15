<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login(){
        return view('auth.login');
    }
    public function process_login(){
        $credentials = request()->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if(auth()->attempt($credentials)){
            return redirect()->route('visitor.index');
        }
        return redirect()->route('auth.login');
    }
}
