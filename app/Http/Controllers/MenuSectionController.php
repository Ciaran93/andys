<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuSection;

class MenuSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $sections = $this->getAllSections();

        return view('admin.menu.menuSections', compact('sections'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $section = new MenuSection();
        $section->name = $request->name;
        $section->description = $request->description;
        $section->menu_id = 1;
        $section->save();

        return $this->index();
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request){

        $section = MenuSection::findOrFail($request->id);
        
        $section->name = $request->name;
        $section->description = $request->description;
        
        $section->save();
        return $this->index();
    }  

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAllSections(){
        return MenuSection::where('ceased', 'f')->get();
        
    }

    public function delete(Request $request){

        $section = MenuSection::findOrFail($request->id);
        $section->ceased = true;
        $section->save();
        
        return $this->index();

    }

    public function editSection($id){

        $section = MenuSection::findOrFail($id);

        return view('admin.menu.editMenuSection',compact('section'));
    }
}
