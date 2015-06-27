<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petz extends Model
{
    protected $table = 'petz';
    
    protected $fillable = [
        'user_id',
        'old_pkc',
        'prefix1',
        'prefix2',
        'suffix',
        'showname',
        'callname',
        'breed',
        'sex',
        'notes',
        'breedfile',
        'version',
        'hexer',
        'breeder',
        'coat',
        'regtype',
        'workflow'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
