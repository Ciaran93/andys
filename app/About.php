<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class About extends Model
{
        protected $table = 'about';

        public static function getLastRow(){
                return DB::table('about')->orderBy('id', 'desc')->first();
        }

}
