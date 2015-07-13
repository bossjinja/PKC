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
    
    //a pet has one sire
    public function sire()
    {
        return $this->hasOne('App\Petz', 'sire_id');
    }
    
    //a pet has one dam
    public function dam()
    {
        return $this->hasOne('App\Petz', 'dam_id');
    }
    
    //a pet is mother to many children
    public function mother()
    {
        return $this->belongsToMany('App\Petz', 'dam_id');
    }
    
    //a pet is father to many children
    public function father()
    {
        return $this->belongsToMany('App\Petz', 'sire_id');
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
    
    public function get_sire()
    {
        return Petz::with('prefix1', 'prefix2', 'suffix')->find($this->sire_id);
    }
    
    public function get_dam()
    {
        return Petz::with('prefix1', 'prefix2', 'suffix')->find($this->dam_id);
    }
    
    //TODO: pedigrees
    public function pedigree()
    {
        //2nd gen - parents
        $sire = $this->get_sire();
        $dam = $this->get_dam();
        
        //sire's family
        if(!empty($sire)){ //3rd gen
            $pedigree['sire'] = $sire;
            //paternal grandsire
            $grandparent = $sire->get_sire();
            if(!empty($grandparent)){ //4th gen
                $pedigree['pgrandsire'] = $grandparent;
                
                //paternal paternal greatgrandsire
                $greatgrandparent = $grandparent->get_sire();
                if(!empty($greatgrandparent)){
                    $pedigree['ppggrandsire'] = $greatgrandparent;
                }
                else{
                    $pedigree['ppggrandsire'] = NULL;
                }
                
                //paternal paternal greatgranddam
                $greatgrandparent = $grandparent->get_dam();
                if(!empty($greatgrandparent)){
                    $pedigree['ppggranddam'] = $greatgrandparent;
                }
                else{
                    $pedigree['ppgranddam'] = NULL;
                }
            }
            else{
                $pedigree['pgrandsire'] = NULL;
            }
            
            //paternal granddam
            $grandparent = $sire->get_dam();
            if(!empty($grandparent)){ //4th gen
                $pedigree['pgranddam'] = $grandparent;
                
                //paternal maternal greatgrandsire
                $greatgrandparent = $grandparent->get_sire();
                if(!empty($greatgrandparent)){
                    $pedigree['pmggrandsire'] = $greatgrandparent;
                }
                else{
                    $pedigree['pmggrandsire'] = NULL;
                }
                
                //paternal maternal greatgranddam
                $greatgrandparent = $grandparent->get_dam();
                if(!empty($greatgrandparent)){
                    $pedigree['pmggranddam'] = $greatgrandparent;
                }
                else{
                    $pedigree['pmgranddam'] = NULL;
                }
            }
            else{
                $pedigree['pgranddam'] = NULL;
            }
        }
        else{
            $pedigree['sire'] = NULL;
        }
        
        //dam's family
        if(!empty($dam)){ //3rd gen
            $pedigree['dam'] = $dam;
            //maternal grandsire
            $grandparent = $dam->get_sire();
            if(!empty($grandparent)){ //4th gen
                $pedigree['mgrandsire'] = $grandparent;
                
                //maternal paternal greatgrandsire
                $greatgrandparent = $grandparent->get_sire();
                if(!empty($greatgrandparent)){
                    $pedigree['mpggrandsire'] = $greatgrandparent;
                }
                else{
                    $pedigree['mpggrandsire'] = NULL;
                }
                
                //maternal paternal greatgranddam
                $greatgrandparent = $grandparent->get_dam();
                if(!empty($greatgrandparent)){
                    $pedigree['mpggranddam'] = $greatgrandparent;
                }
                else{
                    $pedigree['mpgranddam'] = NULL;
                }
            }
            else{
                $pedigree['mgrandsire'] = NULL;
            }
            
            //maternal granddam
            $grandparent = $dam->get_dam();
            if(!empty($grandparent)){ //4th gen
                $pedigree['mgranddam'] = $grandparent;
                
                //maternal maternal greatgrandsire
                $greatgrandparent = $grandparent->get_sire();
                if(!empty($greatgrandparent)){
                    $pedigree['mmggrandsire'] = $greatgrandparent;
                }
                else{
                    $pedigree['mmggrandsire'] = NULL;
                }
                
                //maternal maternal greatgranddam
                $greatgrandparent = $grandparent->get_dam();
                if(!empty($greatgrandparent)){
                    $pedigree['mmggranddam'] = $greatgrandparent;
                }
                else{
                    $pedigree['mmgranddam'] = NULL;
                }
            }
            else{
                $pedigree['mgranddam'] = NULL;
            }
        }
        else{
            $pedigree['dam'] = NULL;
        }
        
        return $pedigree;
    }
}
