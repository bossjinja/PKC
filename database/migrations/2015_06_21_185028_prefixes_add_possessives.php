<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PrefixesAddPossessives extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prefixes', function ($table) {
            $table->enum("prefix_possessive", ["", "\'s", "\'", "s", "\'z", "z"])->after('prefix');
            $table->enum("suffix_possessive", ["", "of", "at", "von", "vom", "de", "d\'", "no"])->after('prefix_possessive');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
