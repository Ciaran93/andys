<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{

    public function index(){
        foreach( $this->getAllItems() as $item){
            print($item);
        }
        return view('admin.menu.menuitem')->with('items', $this->getAllItems());
    }

    public function getAllItems(){
        return Item::all();
    }

    public function addItem(Request $request){

        $item = new Item();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->section_id = 1;

        $item->save();

        return $this->index();

        
    }

}
