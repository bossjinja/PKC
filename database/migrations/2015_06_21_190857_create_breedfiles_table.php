<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBreedfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breedfiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('breedfilename');// e.g. CS Labrador
            $table->string('version');
            $table->integer('hexer_id')->nullable();            
            $table->string('downloadfilename'); 
            $table->string('downloadpath');
            $table->integer('profileimage_id');//like facebook album covers
            $table->text('notes');
            $table->enum('scp', ['Bulldog','Chihuahua','Dachshund','Dalmatian','Great Dane','Labrador','Mutt','Scottie','Sheepdog','Poodle','Alley Cat','B+W Shorthair','Calico','Chinchilla Persian','Persian','Siamese','Maine Coon','Orange Shorthair','Tabby','Russian Blue']);
            $table->enum('base', ['Bulldog','Chihuahua','Dachshund','Dalmatian','Great Dane','Labrador','Mutt','Scottie','Sheepdog','Poodle','Alley Cat','B+W Shorthair','Calico','Chinchilla Persian','Persian','Siamese','Maine Coon','Orange Shorthair','Tabby','Russian Blue']);
            $table->string('offset');
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
        Schema::drop('breedfiles');
    }
}
