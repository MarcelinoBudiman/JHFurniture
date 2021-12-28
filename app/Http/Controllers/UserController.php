<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function viewProfile($id){

        $user = User::find($id);
        return view('profile', compact('user'));
    }
}
