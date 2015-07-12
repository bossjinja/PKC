<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTexturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('textures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('texturefilename');
            $table->integer('creator_id')->nullable();   
            $table->integer('profileimage_id');//for the actual texture BMP, other pictures will be examples of its use on petz
            $table->text('notes');//includes info on not suitable for W8, use this file instead
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('textures');
    }
}
