<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class FurnitureController extends Controller
{
    public function createViewPage(){
        $furnitures = Furniture::paginate(4);

        return view('view_furniture', compact('furnitures'));
    }

    public function createDetailPage($id){
        $furniture = Furniture::find($id);

        if($furniture != null){
            return view('detail', compact('furniture'));
        }

        else return redirect()->back();
    }

    public function createAddPage(){
        return view('add_furniture');
    }

    public function createUpdatePage($id){
        $furniture = Furniture::find($id);

        if($furniture != null){
            return view('update_furniture', compact('furniture'));
        }

        else return redirect()->back();
    }

    public function searchFurniture(Request $request){
        $search_query = $request->query('q');
        $data = Furniture::where('name', "LIKE", "%$search_query%")->paginate(5);
        return view('view_furniture')->with('furnitures', $data)->with('q', $search_query);
    }

    public function insertFurniture(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'unique:furnitures,name|max:15|required',
            'price' => 'numeric|min:5000|max:10000000|required',
            'type' => 'required',
            'color' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png|required'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $furniture = new Furniture();
        $furniture->name = $request->name;
        $furniture->price = $request->price;
        $furniture->type = $request->type;
        $furniture->color = $request->color;

        $file = $request->file('image');
        $imageName = 'NEW_'.$furniture->name.'.'.$file->getClientOriginalExtension();
        Storage::putFileAs('public/images/', $file, $imageName);
        $furniture->image = $imageName;
        $furniture->save();

        session()->flash('message', 'Furniture successfully added!');
        return redirect()->back();
    }

    public function updateFurniture(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'name' => ['required', Rule::unique('furnitures')->ignore($id)],
            'price' => 'numeric|min:5000|max:10000000|required',
            'image' => 'image|mimes:jpg,jpeg,png|nullable'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $furniture = Furniture::find($id);
        if($furniture!=null){
            $furniture->name = ($request->name != null) ? $request->name : $furniture->name;
            $furniture->price = ($request->price != null) ? $request->price : $furniture->price;
            $furniture->type = ($request->type != null) ? $request->type : $furniture->type;
            $furniture->color = ($request->color != null) ? $request->color : $furniture->color;

            $file = $request->file('image');

            if($file != null){
                $imageName = 'New_'.$furniture->name.'.'.$file->getClientOriginalExtension();
                Storage::delete('public/images/'.$furniture->image);
                Storage::putFileAs('public/images/', $file, $imageName);
                $furniture->image = $imageName;
            }

            $furniture->save();
        }

        session()->flash('message', 'Update Successful!');
        return redirect()->back();
    }

    public function deleteFurniture($id){
        $furniture = Furniture::find($id);

        if($furniture != null){
            Storage::delete('public/images/'.$furniture->image);
            $furniture->delete();

            session()->flash('message', 'Furniture successfully deleted!');
            return redirect('home');
        }

        session()->flash('message', "Furniture doesn't exist!");
        return redirect()->back();
    }

}
