<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function createPage(){
        return view('auth.register');
    }

    public function storeUser(Request $request){

        $validate = $request->validate([
            // Required disini untuk jaga jaga jika tembus di required form
            'name' => 'required|unique:users|regex:/^[a-zA-Z ]*$/',
            'email' => 'email:dns|required|unique:users',
            'password' => 'required|min:5|max:20',
            'address' => 'required|min:5|max:95',
            'gender' => 'required'
        ]);

        $validate['password'] = bcrypt($validate['password']);
        User::create($validate);

        return view('auth.login');

    }
}
