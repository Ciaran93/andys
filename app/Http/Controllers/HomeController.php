<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\MenuSectionController;

class HomeController extends Controller
{


    public function index()
    {
        $itemController = new ItemController();
        $items = $itemController->getAllItems();
        $itemsFeatured = $itemController->getFeaturedDishes();
        
        $aboutController = new AboutController();
        $about = $aboutController->getLastRow();

        $menuSectionController = new MenuSectionController();
        $sections = $menuSectionController->getAllSections();

        $catController = new MenuCategoryController();
        $categories = $catController->getAllMenuCategories();
        
        $showSections = new ShowSectionsController();
        $showSection = $showSections->getShowSection();

        return view('home',compact('items','about', 'itemsFeatured', 'sections', 'categories', 'showSection'));
    }

    public function showGin() {
        $showSections = new ShowSectionsController();
        $showSection = $showSections->getShowSection();
        return view('gin.gin',compact('gins', 'showSection'));

    }

    public function showBeef() {
        $showSections = new ShowSectionsController();
        $showSection = $showSections->getShowSection();

        return view('beef.beef', compact('gins', 'showSection'));

    }

}
