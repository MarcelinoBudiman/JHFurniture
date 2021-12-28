<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function createPage(){

        return view('auth.login');
    }

    public function storeSession(Request $request){

        $email = $request->email;
        $password = $request->password;
        $remember = $request->remember;

        $creds = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $valid = auth()->attempt($creds);
        if($valid) {
            if($remember){
                Cookie::queue('email', $email, 60);
                Cookie::queue('password', $password, 60);
            }

            $request->session()->regenerate();

            return redirect()->intended('/home');
        }

        // Supaya ntar bisa di catch ama message bukan error
        return back()->with('loginError', 'Login Failed!');
    }

    public function destroySession(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/home');
    }
}
