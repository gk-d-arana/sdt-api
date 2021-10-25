<?php

namespace App\Http\Controllers;

use App\Models\CarouselImages;
use Illuminate\Http\Request;

class CarouselImagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $carousel_images = CarouselImages::all();
        return response()->json(["data"=>$carousel_images]);
    }
}
