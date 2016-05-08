<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breedfile extends Model
{
    protected $table = 'breedfiles';

    protected $fillable = [
        'breedfilename',
        'version',
        'hexer',
        'downloadfilename',
        'downloadpath',
        'profileimage',
        'notes',
        'scp',
        'base',
        'offset'
    ];

    public function petz(){
        return $this->hasMany('App\Petz');
    }

    public function breeds(){
        return $this->hasMany('App\Breed', 'breedfiles_breeds');
    }

    public function image(){
      return $this->hasMany('App\Image', 'resource_id');
    }
}
