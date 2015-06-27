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
        return $this->belongsToMany('App\User');
    }
}
