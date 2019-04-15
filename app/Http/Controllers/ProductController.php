<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\Product as Products;

class ProductController extends Controller
{
    /**
     * Display the categories selector.
     *
     * @return \Illuminate\Http\Response
     */
    public function categories()
    {
        $categories = Category::all();
        return view('producten.categories', ['categories' => $categories]);

        //return response()->json($categories);
    }

    /**
     * Display a listing of the category.
     *
     * @return \Illuminate\Http\Response
     */
    public function category($categorie, $cid)
    {
        $category = Category::where('id', $cid)->firstOrFail();
        $subcategories = SubCategory::where('category_id', $cid)->get();
        $products = Products::where('categorie_id', $cid)->paginate(15);
        return view('producten.category', ['category' => $category, 'subcategories' => $subcategories, 'products' => $products]);
        //return response()->json($products);
    }

    /**
     * Display a listing of the subcategory.
     *
     * @return \Illuminate\Http\Response
     */
    public function subcategory($categorie, $cid, $subcategorie, $sid)
    {
        $category = Category::where('id', $cid)->first();
        $subcategories = SubCategory::where('category_id', $sid)->get();
        $products = Products::where('categorie_id', $sid)->get();
        return view('producten.category', ['category' => $category, 'subcategories' => $subcategories, 'products' => $products]);
        //return response()->json($products);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($naam, $ean)
    {
        $product = Product::findOrFail($ean);
        $categorie = Category::findOrFail($product->categorie_id);
        return view('producten.product', ['product' => $product, 'categorie' => $categorie]);
    }
}
