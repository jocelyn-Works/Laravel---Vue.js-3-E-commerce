<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class ProductController extends Controller
{
    # afficher les produits
    public function product()
    {

        $products = Product::with('category')->get();

        return response()->json(['getProductWithCategory' => $products]);
    }

    //  un product par son id
    public function productShow(string $id)
    {



        $productId = Product::with('category')->findOrfail($id);
        return response()->json([
            'getProductById' => $productId,
        ]);
    }



    // modifier un produit
    public function updateProduct($id, Request $request)
    {

        $updateProduct = $request->validate([
            'name' => 'bail|required|string|max:50',
            'description' => 'bail|required|string',
            'price' => 'bail|required|numeric|min:0',
            'image' => 'bail|required|string',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $product = Product::findOrFail($id);
        $product->update($updateProduct);

        return response()->json(['updateProduct' => $updateProduct]);
    }

    // suprimer un produit
    public function deleteProduct($id)
    {


        $deleteProduct = Product::findOrFail($id);
        $deleteProduct->delete();

        return response()->json(['deletOneProduct' => $deleteProduct]);
    }

    public function categorieProduct($id)
    {

        $categorie = Category::with('product')->findOrFail($id);
        return response()->json(['categoryIdWithProduct' => $categorie]);
    }
}
