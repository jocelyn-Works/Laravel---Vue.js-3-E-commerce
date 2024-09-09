<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Product;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ProductAdminController extends Controller
{
    public function productAdmin()
    {

        $products = Product::with('category')->get();
        $data = [
            'title' => 'Product'
        ];

        return view('admin.product.product', $data, compact('products'));
    }

    public function product(): View
    {
        $categories = Category::all();
        return view('admin.product.newProduct', compact('categories'));
    }

    // new product
    public function newProduct(Request $request)
    {

        $request->validate([
            'name' => 'bail|required|string|max:50',
            'description' => 'bail|required|string',
            'price' => 'bail|required|numeric|min:0',
            'image' => 'mimes:png,jpeg,jpg|max:2048',
            'category_id' => 'bail|required|exists:categories,id',
        ]);


        $filePath = public_path('uploads/product');

        $insert = new Product();
        $insert->name = $request->name;
        $insert->description = $request->description;
        $insert->price = $request->price;
        $insert->category_id = $request->category_id;

        if ($request->hasFile(('image'))) {
            $file = $request->file('image');
            $file_name = time() . $file->getClientOriginalName();

            $file->move($filePath, $file_name);
            $insert->image = $file_name;
        }
        $result = $insert->save();

        return  $this->productAdmin()->with('message', 'Produit crée');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return  $this->productAdmin()->with('message', 'Product suprimer');
    }

    public function getOneProduct($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('admin.product.update', compact('product', 'categories'));
    }


    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'name' => 'bail|required|string|max:50',
            'description' => 'bail|required|string',
            'price' => 'bail|required|numeric|min:0',
            'image' => 'nullable|mimes:png,jpeg,jpg|max:2048',
            'category_id' => 'bail|required|exists:categories,id',
        ]);

        $product = Product::findOrFail($id);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;


        if ($request->hasFile('image')) {


            if ($product->image && file_exists(public_path('uploads/product/' . $product->image))) {
                unlink(public_path('uploads/product/' . $product->image));
            }
            $file = $request->file('image');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $filePath = public_path('uploads/product/');

            $file->move($filePath, $file_name);


            $product->image = $file_name;
        }
        $product->save();


        return redirect()->route('productAdmin')->with('message', 'Produit modifié avec succès');
    }


    public function searchProduct(Request $request)
    {
        $search = $request->input('search');

        $results = Product::where('name', 'like', "%$search%")->get();

        return $this->productAdmin()->with('results', $results);
    }
}
