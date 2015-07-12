<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBreedfilesBreeds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breedfiles_breeds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('breedfile_id');
            $table->integer('breed_id');
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
        Schema::drop('breedfiles_breeds');
    }
}
