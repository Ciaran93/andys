<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShowSection;

class ShowSectionsController extends Controller
{
    public function index(){

        //INSERT into show_sections (show_featured, show_about, show_gift,show_reservation ) VALUES (true, true,true,true);
        $section = ShowSection::find(1);

        return view('admin.showSections.show-sections', compact('section'));
    }

    public function getShowSection(){

        return ShowSection::find(1);
    }

    public function update(Request $request){

        $show_featured = (!empty($request->show_featured)) ? 1 : 0;
        $show_menu = (!empty($request->show_menu)) ? 1 : 0;
        $show_about = (!empty($request->show_about)) ? 1 : 0;
        $show_tripadvisor = (!empty($request->show_tripadvisor)) ? 1 : 0;
        $show_featured = (!empty($request->show_featured)) ? 1 : 0;
        $show_reservation = (!empty($request->show_reservation)) ? 1 : 0;
        $show_gift = (!empty($request->show_gift)) ? 1 : 0;

        $section = ShowSection::find(1);
        $section->show_featured = $show_featured;
        $section->show_menu = $show_menu;
        $section->show_about = $show_about;
        $section->show_tripadvisor = $show_tripadvisor;
        $section->show_reservation = $show_reservation;
        $section->show_gift = $show_gift;
        $section->save();

        

        return $this->index();
        

    }
}
