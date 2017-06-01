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
        return view('admin.menu.menuitem');
    }



    public function getAllItems(){
        return Item::all();
    }
}
