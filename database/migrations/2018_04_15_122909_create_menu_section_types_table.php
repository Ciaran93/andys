<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuSectionTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('menu_section_types', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('name');
        //     $table->integer('menu_section_id')->nullable();
        //     // $table->foreign('menu_section_id')->references('id')->on('menu_sections');
        //     $table->boolean('ceased')->default(false);
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_section_types');
    }
}
