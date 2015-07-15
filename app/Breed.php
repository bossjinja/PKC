<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    protected $table = 'breeds';
    
    protected $fillable = [
        'breedname',
        'breedgroup_id',
        'structure',
        'color',
        'faultsdqs',
        'notes'
    ];
    
    public function petz(){
        return $this->hasMany('App\Petz');
    }
    
    public function breedgroup(){
        return $this->belongsTo('App\Breedgroup');
    }
}
