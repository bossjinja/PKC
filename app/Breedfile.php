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
}