<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Furniture;

class HomeController extends Controller
{
    public function createPage(){
        $furnitures = Furniture::paginate(4);

        return view('home', compact('furnitures'));
    }
}
