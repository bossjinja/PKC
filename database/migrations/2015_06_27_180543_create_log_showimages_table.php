<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogShowimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_showimages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pet_id');
            $table->string('filename');
            $table->integer('size');
            $table->integer('width');
            $table->integer('height');
            $table->enum('used', ['Yes', 'No'])->default('No');
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
        Schema::drop('log_showimages');
    }
}
