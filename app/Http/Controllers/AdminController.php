<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\FoodsInfoController;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.home');
    }

    public function items(){
        $itemController = new ItemController();
        return $itemController->index();
    }

    public function about(){
        $aboutController = new AboutController();
        return $aboutController->index();
    }

    public function foods(){
        $foodsInfo = new FoodsInfoController();
        return $foodsInfo->index();
    }

    public function editItem($id){
        $itemController = new ItemController();
        return $itemController->editItem($id);
    }

    public function media(){
        $mediaController = new MediaController();
        return $mediaController->index();
    }
}
