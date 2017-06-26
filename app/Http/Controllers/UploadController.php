<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
class UploadController extends Controller
{

    public function upload(){

        request()->file('imageurl')->store('app');

    }
}
