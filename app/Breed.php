<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    protected $table = 'breeds';
    
    protected $fillable = [
        'breedname',
        'breedgroup',
        'structure',
        'color',
        'faultsdqs',
        'notes'
    ];
    
    public function petz(){
        return $this->hasMany('App\Petz');
    }
}
