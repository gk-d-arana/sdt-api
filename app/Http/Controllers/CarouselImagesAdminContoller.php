<?php

namespace App\Http\Controllers;

use App\Models\CarouselImages;
use Illuminate\Http\Request;

class CarouselImagesAdminContoller extends Controller
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
        $carousel_images = CarouselImages::all();
        return view('carousel_images', ["carousel_images"=>$carousel_images]);
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
            "carousel_image_image"=>"required",
        ]);
        $imageName = null;
        if($request->hasFile('carousel_image_image')){
            $imageName = time().'.'.$request->file('carousel_image_image')->getClientOriginalExtension();
            $request->file('carousel_image_image')->move(public_path(), $imageName);
            $carousel_image = new CarouselImages();
            $carousel_image->carousel_image=$imageName;
            $carousel_image->save();
        }
        return redirect('/admin/carousel_images/')->with('success','Carousel Image Added successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carousel_image = CarouselImages::find($id)->first();
        $carousel_image->delete();
        return redirect('/admin/carousel_images/')->with('danger','Carousel Image deleted successfully');
    }
}
