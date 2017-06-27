<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AboutController;

class HomeController extends Controller
{


    public function willBeindex()
    {
        $itemController = new ItemController();
        $items = $itemController->getAllItems();
        $itemsFeatured = $itemController->getFeaturedDishes();
        $aboutController = new AboutController();
        $about = $aboutController->getLastRow();

        $blogController = new BlogController();
        $blogPosts = $blogController->getAllBlogPosts();

        return view('home',compact('items','about', 'itemsFeatured', 'blogPosts'));
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
