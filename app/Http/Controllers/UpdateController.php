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

        $users = User::find($id);
        $users->name = ($request->name != null) ? $request->name : $users->name;
        $users->email = $request->email;
        $users->password = $pw;
        $users->save();


        return redirect()->back();
    }

    public function updateUser(Request $request, $id){

        $validate = $request->validate([
            'name' => 'required|unique:users|max:15',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:5|max:20',
            'address' => 'required|min:5|max:95'
        ]);
        $pw = bcrypt($validate['password']);

        $users = User::find($id);
        $users->name = ($request->name != null) ? $request->name : $users->name;
        $users->email = $request->email;
        $users->password = $pw;
        $users->address = $request->address;
        $users->save();


        return redirect()->back();
    }
}
