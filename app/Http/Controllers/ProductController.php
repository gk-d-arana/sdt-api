<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
        public function index(Request $request){
        $section_id = $request->section_id;
        $products = Product::where('section_id', $section_id)->select( "product_name", "product_description",  "product_arabic_name", "product_arabic_description","product_image")->get();
        return response()->json(['products' => $products]);
    }
    public function latest_products(Request $request){
        $products = Product::latest()->take(6)->get();
        return response()->json(["data"=>$products]);
    }
}
