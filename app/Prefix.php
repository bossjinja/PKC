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
        'notes'
    ];
    
    public $prefix_possessives = [
        "none" => "",
        "'" => "'",
        "'s" => "'s",
        "s" => "s",
        "'z" => "'z",
        "z" => "z"
    ];
    
    public $suffix_possessives = [
        "none" => "",
        "of" => "of",
        "at" => "at",
        "von" => "von",
        "vom" => "vom",
        "de" => "de",
        "d'" => "d'",
        "no" => "no",
        "z" => "z"
    ];
    
    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
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
