<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use DB;
class ItemController extends Controller
{

    public function index(){
        $items = $this->getAllItems();
        $sections = $this->getAllSections();

        return view('admin.menu.menuitem', compact('items', 'sections'));
    }

    public function getAllItems(){
        return Item::all();
    }

    public function getAllSections(){
        return DB::table('menu_section')->get();
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

}
