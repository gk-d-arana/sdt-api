<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index(Request $request){
        $main_section_id = $request->main_section_id;
        $sections = Section::select("section_name", "section_description", "section_arabic_name", "section_arabic_description",  "section_image")->where('main_section_id', $main_section_id)->get();
        return response()->json(['sections' => $sections]);
    }

}





