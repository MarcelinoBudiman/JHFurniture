<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use Illuminate\Http\Request;

class FurnitureController extends Controller
{
    public function createViewPage(){
        $furnitures = Furniture::all();

        return view('view_furniture', compact('furnitures'));
    }

    public function insertFurniture(){

    }

    public function deleteFurniture(){

    }
}
