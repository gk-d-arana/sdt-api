<?php

namespace App\Http\Controllers;

use App\Models\MainSection;
use Illuminate\Http\Request;

class MainSectionAdminController extends Controller
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
        return view('main_sections', ["main_sections"=>$main_sections]);
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
            "main_section_name"=>"required|string",
            "main_section_description"=>"required|string",
            "main_section_arabic_name"=>"required|string",
            "main_section_arabic_description"=>"required|string",
            "main_section_image"=>"required"
        ]);
        $imageName = null;
        if($request->hasFile('main_section_image')){
            $imageName = time().'.'.$request->file('main_section_image')->getClientOriginalExtension();
            $request->file('main_section_image')->move(public_path(), $imageName);
        }
        $main_section = new MainSection();
        $main_section->main_section_name = $request->main_section_name;
        $main_section->main_section_description = $request->main_section_description;
        $main_section->main_section_arabic_name = $request->main_section_arabic_name;
        $main_section->main_section_arabic_description = $request->main_section_arabic_description;
        $main_section->main_section_image=$imageName;
        $main_section->save();
        return redirect('/admin/main_sections/')->with('success','Main Section Added successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $main_section = MainSection::find($id)->first();
        return view("show_main_section" , ["main_section"=>$main_section]);
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
        $main_section = MainSection::find($id)->first();


        $main_section->main_section_name = $request->main_section_name;
        $main_section->main_section_description = $request->main_section_description;
        $main_section->main_section_arabic_name = $request->main_section_arabic_name;
        $main_section->main_section_arabic_description = $request->main_section_arabic_description;


        if($request->hasFile('main_section_image')){
            $imageName = time().'.'.$request->file('main_section_image')->getClientOriginalExtension();
            $request->file('main_section_image')->move(public_path(), $imageName);
            $main_section->main_section_image=$imageName;
        }

        $main_section->save();
        return redirect('/admin/main_sections/')->with('success','Main Section Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $main_section = MainSection::find($id)->first();
        $main_section->delete();
        return redirect('/admin/main_sections/')->with('danger','Main Section deleted successfully');
    }
}
