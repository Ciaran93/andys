<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use DB;
class ItemController extends Controller
{

    public function index(){
        $items = $this->getNonCeasedItems();
        $sections = $this->getAllSections();

        return view('admin.menu.menuitem', compact('items', 'sections'));
    }

    public function getAllItems(){
        return Item::all();
    }
    
    public function getNonCeasedItems(){
        return Item::where('ceased', 0)->get();
    }

    public function getAllSections(){

        $sectionController = new MenuSectionController();
        $sections = $sectionController->getAllSections();

        return $sections;

    }

    public function getFeaturedDishes(){
        $featured = Item::where('featured', 1)->get();

        return (!$featured->isEmpty()) ? $featured : null;
    }

    public function addItem(Request $request){

        $item = new Item();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->section_id = $request->section_id;
        $item->featured = ($request->featured == null ? false : true);
        $item->gf = ($request->gf == null ? false : true);
        $item->veg = ($request->veg == null ? false : true);
        
        $item->save();
        return $this->index();
    }

    public function editItem($id){

        $item = Item::findOrFail($id);
        $sections = $this->getAllSections();
        return view('admin.menu.editItem',compact('item','sections'));
    }

    public function update(Request $request){

        $item = Item::findOrFail($request->id);
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->section_id = $request->section_id;
        $item->featured = ($request->featured == null ? false : true);
        $item->gf = ($request->gf == null ? false : true);
        $item->veg = ($request->veg == null ? false : true);
        
        $item->save();
        return $this->index();
    }    


    public function delete(Request $request){

        $item = Item::findOrFail($request->id);
        $item->ceased = true;
        $item->save();
        return $this->index();
    } 

}
