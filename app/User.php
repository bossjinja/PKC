<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    
    public function owners()
    {
        return $this->hasMany('App\Petz', 'owner_id');
    }
    
    public function hexers()
    {
        return $this->hasMany('App\Petz', 'hexer_id');
    }
    
    public function breeders()
    {
        return $this->hasMany('App\Petz', 'breeder_id');
    }
    
    public function prefixes()
    {
        return $this->hasMany('App\Prefix');
    }
}
