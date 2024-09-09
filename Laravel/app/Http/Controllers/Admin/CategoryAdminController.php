<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryAdminController extends Controller
{
    public function bladeCategories(){
        $categories=Category::all();

        return view('admin.category', ['categories' => $categories]);
    }

    public function bladeCreateCategory(Request $request){
        $category = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:255'],
       ]);

        $category = new Category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();

        return $this->bladeCategories()->with('message', 'Categorie Crée');
    }
    
    public function bladeUpdateCategory(Request $request){

        $category = $request->validate([
             'name' => ['required', 'string', 'max:50'],
             'description' => ['required', 'string', 'max:255'],
        ]);

         $category = Category::find($request->id);
             if($category){
               $category->name=$request->name;
               $category->description=$request->description;
               $category->save();
         }

        return $this->bladeCategories()->with('message', 'Categorie Modifié');
    }

    public function bladeDeleteCategory(Request $request){
        $category = Category::find($request->id);
        if($category){
            $category->delete();
            return $this->bladeCategories()->with('message', 'Categorie Supprimé');
        }
    }

    public function searchCategory(Request $request){
        $search = $request->input('search');
        
        $results = Category::where('name', 'like', "%$search%")
        ->orWhere('description', 'like', "%$search%")->get();

        return $this->bladeCategories()->with('results', $results);
    }
}
