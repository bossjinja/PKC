<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prefix extends Model
{
    protected $table = 'prefixes';
    
    protected $fillable = [
        'prefix',
        'prefix_possessive',
        'suffix_possessive',
        'notes',
        'display'
    ];
    
    public function users()
    {
        return $this->hasMany('App\User');
    }
    
    public function prefix1()
    {
        return $this->hasMany('App\Petz', 'prefix1_id');
    }
    
    public function prefix2()
    {
        return $this->hasMany('App\Petz', 'prefix2_id');
    }
    
    public function suffix()
    {
        return $this->hasMany('App\Petz', 'suffix_id');
    }
}
