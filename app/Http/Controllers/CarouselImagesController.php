<?php

namespace App\Http\Controllers;

use App\Models\CarouselImages;
use Illuminate\Database\Eloquent\Collection;
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
        $data = new Collection();
        for ($i=0; $i < count($carousel_images) ; $i++) {
            $main_section = $carousel_images[$i]->main_section;
            $data->push([
                "carousel_image" => $carousel_images[$i]->carousel_image,
                "main_section" => $main_section
            ]);
        }
        return response()->json(["data"=>$data]);
    }
}
