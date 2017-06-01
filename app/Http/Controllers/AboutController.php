<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;

class AboutController extends Controller
{
    
    public function index(){

        return view('admin.about.about')->with('about', $this->getLastRow());
    }

    public function getLastRow(){

        return About::getLastRow();
    }


    public function updateAbout(Request $request){

        $about = new About();
        $about->title = "About";//
        $about->content = $request->content;
        $about->image_id = 1;
        $about->save();

        return $this->index();

    }
}
