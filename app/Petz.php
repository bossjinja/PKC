<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petz extends Model
{
    protected $table = 'petz';
    
    protected $fillable = [
        'user_id',
        'oldpkc_id',
        'prefix1_id',
        'prefix2_id',
        'suffix_id',
        'showname',
        'callname',
        'breed_id',
        'sex',
        'notes',
        'breedfile_id',
        'version',
        'sire_id',
        'dam_id',
        'hexer_id',
        'breeder_id',
        'handler_id',
        'coat',
        'regtype',
        'workflow',
        'profileimage_id'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
