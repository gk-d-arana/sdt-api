<?php

namespace App\Http\Controllers;

use App\Models\MainSection;
use Illuminate\Http\Request;

class MainSectionController extends Controller
{
    public function index(Request $request){
        $main_sections = MainSection::all('id', 'main_section_name' , 'main_section_description', 'main_section_arabic_name' , 'main_section_arabic_description','main_section_image');
        return response()->json(['main_sections' => $main_sections]);

    }
}

