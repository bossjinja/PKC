<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePrefixTableAddZSuffix extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE prefixes MODIFY COLUMN suffix_possessive ENUM('','of','at','von','vom','de','d''','no','z')");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE prefixes MODIFY COLUMN suffix_possessive ENUM('','of','at','von','vom','de','d''','no')");
    }
}
