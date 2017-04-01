<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    //FIELDS
    //resource_id - foreign key to whatever resource it belongs to (pet, breedfile, etc)
    //filename
    //path
    //imagetype - Pet, Breedfile, Texture

    //RELATIONSHIPS
    public function pet()
    {
      $this->belongsTo('App\Petz', 'resource_id');
    }

    public function breedfile()
    {
      $this->belongsTo('App\Breedfile', 'resource_id');
    }

    //GETTERS
    public function get_imagetype()
    {
      return $this->imagetype;
    }

    public function get_fullpath()
    {
      return $this->path.'/'.$this->filename;
    }

    public function get_filename()
    {
      return $this->filename;
    }

    public function get_path()
    {
      return $this->path;
    }
}
