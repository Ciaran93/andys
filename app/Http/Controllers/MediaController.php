<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class MediaController extends Controller
{
    public function index(){

        $files = self::getAllFiles();
        return view('admin.media.main', compact('files'));
    }

    public function getAllFiles($directory = null){

        $files = Storage::disk('public')->allFiles();
        
        return $files;
    }


    public function upload(Request $request){

        $original_filename = $request->file('imageurl')->hashName();
        $image_name_arr = explode('.',$original_filename);
        $filename = $request->imageName . '.' . $image_name_arr[1];

        $path = Storage::putFileAs('public', $request->file('imageurl'), $filename, 'public');

        self::index();

    }
}
