<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class About extends Model
{
        protected $table = 'about';

        public function About(){


        }

        public static function getLastRow(){

                $about = DB::table('about')->orderBy('id', 'desc')->first();
                
                return !empty($about) ? $about : new Self();
        }

}
