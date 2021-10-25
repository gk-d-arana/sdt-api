<?php

namespace App\Http\Controllers;

use App\Models\MainSection;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionAdminController extends Controller
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
        $main_sections = MainSection::all();
        $sections = Section::all();
        return view('sections', ["main_sections"=>$main_sections, "sections"=>$sections]);
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
            "section_name"=>"required|string",
            "section_description"=>"required|string",
            "section_main_section"=>"required",
            "section_image"=>"required"
        ]);
        $imageName = null;
        if($request->hasFile('section_image')){
            $imageName = time().'.'.$request->file('section_image')->getClientOriginalExtension();
            $request->file('section_image')->move(public_path(), $imageName);
        }
        $main_section_id = (int)$request->section_main_section;
        $section = new Section();
        $section->section_name = $request->section_name;
        $section->section_description = $request->section_description;
        $section->section_image=$imageName;
        $section->main_section_id = $main_section_id;
        $section->save();
        return redirect('/admin/sections/')->with('success','Section Added successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $section = Section::find($id)->first();
        $main_sections = MainSection::all();
        return view('show_section', ["section"=>$section, "main_sections"=>$main_sections]);
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
        $section = Section::find($id)->first();
        $section->update($request->except(['_token', 'section_image']));
        $section->main_section_id=$request->section_main_section;
        if($request->hasFile('section_image')){
            $imageName = time().'.'.$request->file('section_image')->getClientOriginalExtension();
            $request->file('section_image')->move(public_path(), $imageName);
            $section->section_image=$imageName;
        }
        $section->save();

        return redirect('/admin/sections/')->with('success','Section Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = Section::find($id)->first();
        $section->delete();
        return redirect('/admin/sections/')->with('danger','Section deleted successfully');
    }
}
