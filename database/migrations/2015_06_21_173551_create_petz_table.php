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
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('old_pkc');
            $table->integer('prefix1');
            $table->integer('prefix2');
            $table->integer('suffix');
            $table->string('showname');
            $table->string('callname');
            $table->integer('breed');
            $table->enum('sex', ['male', 'female']);
            $table->text('notes');
            $table->integer('breedfile');
            $table->enum('version', ['Petz 3/4', 'Petz 5']);
            $table->integer('hexer');
            $table->integer('breeder');
            $table->string('coat');
            $table->enum('regtype', ['Full', 'Limited']);
            $table->enum('workflow', ['Partial', 'Submitted', 'Approved', 'Reject', 'Complete']);
            $table->integer('profileimage');
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
        Schema::drop('petz');
    }
}
