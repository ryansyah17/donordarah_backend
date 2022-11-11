<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function halamanlogin(){
        return view('login.index');
    }

    public function postlogin(Request $request){
        // $credentials = $request->validate([
        //     'email' => ['required', 'email:dns'],
        //     'password' => ['required']
        // ]);
 
        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/member');
        // }
        // if(Auth::attempt($request->only('email','password'))){
        //     return redirect('/');
        // }
        return redirect('/login');
    }

    public function logout(){}
}
