<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuSectionType;

class MenuSectionTypeController extends Controller
{

    public function index(){

        $sections = $this->getMenuSectionTypes();
        return view('admin.menu.menuSectionTypes', compact('sections'));

    }

    public function getMenuSectionTypes(){
        return MenuSectionType::where('ceased', 'f')->get();
    }

    public function getMenuSectionTypesAjax(Request $request){
        
        $types = MenuSectionType::where('ceased', 'f')->get();
        echo json_encode($types); 
    }

    public function create(Request $request){

        $type = new MenuSectionType();
        $type->name = $request->name;
        $type->save();

        return $this->index();
    }

    public function delete(Request $request){

        $type = MenuSectionType::findOrFail($request->id);
        $type->ceased = true;
        $type->save();
        return $this->index();

    }


}
