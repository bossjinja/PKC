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
            $table->integer('oldpkc_id')->nullable();
            $table->integer('prefix1_id')->nullable();
            $table->integer('prefix2_id')->nullable();
            $table->integer('suffix_id')->nullable();
            $table->string('showname');
            $table->string('callname');
            $table->integer('breed_id');
            $table->enum('sex', ['male', 'female']);
            $table->text('notes');
            $table->integer('breedfile_id');
            $table->enum('version', ['Petz 3/4', 'Petz 5']);
            $table->integer('sire_id')->nullable();
            $table->integer('dam_id')->nullable();
            $table->integer('hexer_id')->nullable();
            $table->integer('breeder_id')->nullable();
            $table->integer('handler_id')->nullable();
            $table->string('coat');
            $table->enum('regtype', ['Full', 'Limited']);
            $table->enum('workflow', ['Draft', 'Submitted', 'Approved', 'Rejected', 'Complete']);
            $table->integer('profileimage_id');
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
