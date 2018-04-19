<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\MenuSectionController;

class HomeController extends Controller
{


    public function willBeindex()
    {
        $itemController = new ItemController();
        $items = $itemController->getAllItems();
        $itemsFeatured = $itemController->getFeaturedDishes();
        
        $aboutController = new AboutController();
        $about = $aboutController->getLastRow();

        $menuSectionController = new MenuSectionController();
        $sections = $menuSectionController->getAllSections();

        $typeController = new MenuSectionTypeController();
        $sectionTypes = $typeController->getMenuSectionTypes();
// echo '<pre>'; print_r($sectionTypes); exit;

        $blogController = new BlogController();
        $blogPosts = $blogController->getAllBlogPosts();

        $menu_arr = $this->formatSections($items,$sections, $sectionTypes);

        return view('home',compact('items','about', 'itemsFeatured', 'blogPosts', 'sections', 'sectionTypes', 'menu_arr'));
    }


    private function formatSections($items, $sections, $sectionTypes){

        $menu_arr = array();
        
        // foreach($sections as $section){

        //     foreach($sectionTypes as $type){

        //         if($type->menu_section_id == $section->id){

        //             $section->types[] = $type;

        //         }
        //     }

        // }

        // foreach($sections as $section){

        //     foreach($items as $item){

        //         if($item->section_id == $section->id){

        //             $section['items'] = $item;
        //         }
        //     }


        // }
        

        // echo '<pre>'; print_r($sections); exit;
        
        
        return $menu_arr;
    }

    public function index(){
        return view('comingsoon');
        
    }


    public function about(){
        return view('home.aboutSingle');
    }

    public function history(){
        return view('home.history');
    }

}
