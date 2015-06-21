<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetzTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petz', function (Blueprint $table) {
            $table->increments('id')
                  ->integer('user_id')
                  ->integer('prefix1')
                  ->integer('prefix2')
                  ->integer('suffix')
                  ->string('showname')
                  ->string('callname')
                  ->integer('breed')
                  ->enum('sex', ['male', 'female'])
                  ->text('notes')
                  ->integer('breedfile')
                  ->enum('version', ['Petz 3/4', 'Petz 5'])
                  ->integer('hexer')
                  ->integer('breeder')
                  ->string('coat')
                  ->enum('regtype', ['Full', 'Limited'])
                  ->timestamps()
                  ->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('petz');
    }
}
