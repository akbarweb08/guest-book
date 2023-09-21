<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function view_login(){
        return view('login');
    }
    public function process_login(){
        $credentials = request()->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        // dd($credentials);
        if(auth()->attempt($credentials)){
            return redirect('/dashboard-admin');
        }
        return route('login', ['error' => 'unable_to_authenticate']);
    }
    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
