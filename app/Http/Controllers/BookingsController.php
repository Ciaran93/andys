<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingsController extends Controller
{
    public function reply(){
        mail('mccaugheyciaran@gmail.com','Subject of the e-mail','This is the body of the e-mail!');
    }
}
