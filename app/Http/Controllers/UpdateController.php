<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpdateController extends Controller
{
    public function createPage($id){

        $user = User::find($id);
        return view('update_profile', compact('user'));
    }

    public function updateAdmin(Request $request, $id){

        $validate = $request->validate([
            'name' => 'required|unique:users|max:15',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:5|max:20',
        ]);
        $pw = bcrypt($validate['password']);

        $user = User::find($id);
        $user->name = ($request->name != null) ? $request->name : $user->name;
        $user->email = $request->email;
        $user->password = $pw;
        $user->save();


        return view('profile', compact('user'));
    }

    public function updateUser(Request $request, $id){

        $validate = $request->validate([
            'name' => 'required|unique:users|max:15',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:5|max:20',
            'address' => 'required|min:5|max:95'
        ]);
        $pw = bcrypt($validate['password']);

        $user = User::find($id);
        $user->name = ($request->name != null) ? $request->name : $user->name;
        $user->email = $request->email;
        $user->password = $pw;
        $user->address = $request->address;
        $user->save();


        return view('profile', compact('user'));
    }
}
