<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::where('is_published',1)->get();
        return view('products.index',compact('products'));
    }

    public function create(){
        return view('products.create');
    }
}
