<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuSection;
use App\MenuSectionType;

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


        // remove all menu section types from the menu id
        $sectionTypes = MenuSectionType::where('menu_section_id', $request->id)->get();
        foreach($sectionTypes as $type){
            $type->menu_section_id = null;
            $type->save();
        }
        
        // set the selected ones
        if($request->menu_section_types_arr != null){

            $section_types_id_arr = json_decode($request->menu_section_types_arr);
            
            foreach($section_types_id_arr as $type_id){
                if($type_id > 0){
                    $sectionType = MenuSectionType::findOrFail($type_id);
                    $sectionType->menu_section_id = $request->id;
                    $sectionType->save();
                }
                
            }

        } 
        
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

        $sectionTypeController = new MenuSectionTypeController();
        $sectionTypes = $sectionTypeController->getMenuSectionTypes();

        $section = MenuSection::findOrFail($id);

        $sectionTypesSelected = MenuSectionType::where('menu_section_id', $id)->get();

        $selectedIds = array();

        foreach($sectionTypesSelected as $selected){
            $selectedIds[] = $selected->id;
        }

        return view('admin.menu.editMenuSection',compact('section', 'sectionTypes', 'sectionTypesSelected', 'selectedIds'));
    }
}
