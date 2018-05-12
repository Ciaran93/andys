<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function formatDate($date=null){

        if($date != null){

            $date_arr = explode('/',$date);

            return $date_arr[2] . '-' . $date_arr[1] . '-' .$date_arr[0];

        }

    }
}
