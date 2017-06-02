<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FoodsInfo;
class FoodsInfoController extends Controller
{
    

    public function index(){

         return view('admin.foods.info')->with('foods', $this->getAllFoodsInfo());
    }

    public function getAllFoodsInfo(){
        return FoodsInfo::all();
    }
}
