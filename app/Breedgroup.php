<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breedgroup extends Model
{
    protected $table = 'breedgroups';
    
    protected $fillable = [
        'species',
        'groupname',
        'notes',
        'visibility',
        'displayorder'
    ];
    
    public function breeds(){
      return $this->hasMany('App\Breed');
    }
}
