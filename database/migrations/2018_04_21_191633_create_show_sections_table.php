<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('show_featured');
            $table->boolean('show_gift');
            $table->boolean('show_reservation');
            $table->boolean('show_about');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('show_sections');
    }
}
