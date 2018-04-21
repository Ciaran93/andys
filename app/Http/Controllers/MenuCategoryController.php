<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuCategory;


class MenuCategoryController extends Controller
{

    public function index($menu_section_id){

        return view('admin.menu.menuCategory')->with('menu_section_id', $menu_section_id);
    }
    
    public function addCategory(Request $request){

        $category = new MenuCategory();
        $category->name = $request->name;
        $category->menu_section_id = $request->menu_section_id;
        $category->save();

        $sectionController = new MenuSectionController();
        return $sectionController->editSection($request->menu_section_id);

    }


    public function getAllMenuCategories(){
        
        return MenuCategory::all();

    }

    public function delete($menu_section_id, $id){

        $cat = MenuCategory::find($id);
        $cat->delete();

        $sectionController = new MenuSectionController();
        return $sectionController->editSection($menu_section_id);
    }

    public function getMenuCategoriesAjax($menu_section_id){
        
        return json_encode(MenuCategory::where('menu_section_id', (int)$menu_section_id)->get());

    }
}
