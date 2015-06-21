<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBreedgroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breedgroups', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('species', ['Cat', 'Dog']);
            $table->string('groupname');
            $table->text('notes');
            $table->enum('visibility', ['Visible', 'Invisible']);
            $table->integer('displayorder');
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
        Schema::drop('breedgroups');
    }
}
