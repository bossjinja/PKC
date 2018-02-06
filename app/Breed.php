<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    protected $table = 'breeds';

    protected $fillable = [
      'name',
      'standard_url',
      'group'
    ];

    public function getGroup(){
      return config('groups.order.'.$this->group);
    }
}
