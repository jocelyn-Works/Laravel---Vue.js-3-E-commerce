<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function showCategories(){
        return response()->json(["categories"=>Category::all()]);
    }

    public function showCategory(int $id){
        return response()->json(["category"=>Category::where('id',$id)->get()]);
    }

    #POST
    public function insertCategory(Request $request){
        
        $category = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:255'],
        ]);

        $category = new Category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();
        return response()->json(["category"=>$category]);
    }

    #PUT
    public function modifCategory(Request $request){

        $category = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:255'],
        ]);

        $category = Category::find($request->id);
        if($category){
            $category->name=$request->name;
            $category->description=$request->description;
            $category->save();
            return response()->json(["category"=>$category]);
        }
    }

    #PATCH
    public function updateColumnCategory(Request $request){

        $category = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:255'],
        ]);
        
        $category = Category::find($request->id);
        if($category){
            $category->name=$request->name;
            $category->save();
            return response()->json(["category"=>$category]);
        }
    }

    #DELETE
    public function deleteCategory(Request $request){
        $category = Category::find($request->id);
        if($category){
            $category->delete();
            return response()->json("la categorie est bien supprimer");
        }
    }
}