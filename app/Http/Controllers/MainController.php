<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('index', compact('products'));
    }

    public function categories()
    {
        $categories = Category::get();
        return view('categories', compact('categories'));
    }

    public function category($code) {
        $category = Category::where('code', $code)->first();
        $products = Product::where('category_id', $category )->get();
        return view('category', compact('category','products'));
    }

    public function product($category, $product = null) {
        return view('product', ['product' => $product]);
    }

}
