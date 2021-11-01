<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;

class ProductAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $sections = Section::all();
        return view('products', ["products"=>$products, "sections"=>$sections]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "product_name"=>"required|string",
            "product_description"=>"required|string",
            "product_section"=>"required",
            "product_image"=>"required"
        ]);
        $imageName = null;
        if($request->hasFile('product_image')){
            $imageName = time().'.'.$request->file('product_image')->getClientOriginalExtension();
            $request->file('product_image')->move(public_path(), $imageName);
        }
        $section_id = (int)$request->product_section;
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_arabic_name = $request->product_arabic_name;
        $product->product_arabic_description = $request->product_arabic_description;
        $product->product_image=$imageName;
        $product->section_id = $section_id;
        $product->save();
        return redirect('/admin/products/')->with('success','Product Added successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id)->first();
        $sections = Section::all();
        return view('show_product', ["product"=>$product, "sections"=>$sections]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $product = Product::find($id)->first();
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_arabic_name = $request->product_arabic_name;
        $product->product_arabic_description = $request->product_arabic_description;
        $product->section_id = $request->product_section;
        if($request->hasFile('product_image')){
            $imageName = time().'.'.$request->file('product_image')->getClientOriginalExtension();
            $request->file('product_image')->move(public_path(), $imageName);
            $product->product_image=$imageName;
        }
        $product->save();

        return redirect('/admin/products/')->with('success','Product Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id)->first();
        $product->delete();
        return redirect('/admin/products/')->with('danger','Product deleted successfully');
    }
}
