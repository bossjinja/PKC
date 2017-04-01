<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrefixesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prefixes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prefix', 30)->unique();
            $table->enum("prefix_possessive", ["", "\'s", "\'", "s", "\'z", "z"]);
            $table->enum("suffix_possessive", ["", "of", "at", "von", "vom", "de", "d\'", "no", "z"]);
            $table->string('display', 30);
            $table->string('notes');
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
        Schema::drop('prefixes');
    }
}
