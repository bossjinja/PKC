<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petz extends Model
{
    protected $table = 'petz';
    
    protected $fillable = [
        'user_id',
        'old_pkc_id',
        'prefix1_id',
        'prefix2_id',
        'suffix_id',
        'showname',
        'callname',
        'breed_id',
        'sex',
        'notes',
        'breedfile',
        'version',
        'hexer_id',
        'breeder_id',
        'coat',
        'regtype',
        'workflow'
    ];
    
    //RELATIONSHIPS
    
    public function owner()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    
    public function hexer()
    {
        return $this->belongsTo('App\User', 'hexer_id');
    }
    
    public function breeder()
    {
        return $this->belongsTo('App\User', 'breeder_id');
    }
    
    public function breed()
    {
        return $this->belongsTo('App\Breed');
    }
    
    public function breedfile()
    {
        return $this->belongsTo('App\Breedfile');
    }
    
    public function prefix1()
    {
        return $this->belongsTo('App\Prefix', 'prefix1_id');
    }
    
    public function prefix2()
    {
        return $this->belongsTo('App\Prefix', 'prefix2_id');
    }
    
    public function suffix()
    {
        return $this->belongsTo('App\Prefix', 'suffix_id');
    }
    
    //SPECIAL METHODS
    
    public function formatted_showname()
    {
        $showname = '';
        //pull prefix1 if present
        if(!empty($this->prefix1)){
           $showname .= $this->prefix1->display;
        }
        //pull prefix2 if present
        if(!empty($this->prefix2)){
            //always use posessive
            $showname .= ' '.$this->prefix2->display;
            if(!empty($this->prefix2->prefix_possessive))
            {
                $showname .= $this->prefix2->prefix_possessive;
            }
        }
        //next add the showname itself
        $showname .= ' '.$this->showname;
        
        //pull suffix if present
        if(!empty($this->suffix)){
            //always check for posessive
            if(!empty($this->suffix->suffix_possessive)){
                $showname .= ' '.$this->suffix->suffix_possessive;
            }
            $showname .= ' '.$this->suffix->display;
        }
        
        return $showname;
    }
    
    //TODO: pedigrees
}
