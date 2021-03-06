<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){

        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role){

        if(is_string($role)){

            return $this->roles->contains('name', $role);
        }

        return $role->intersect($this->roles)->count();
    }

    public function isAdmin(){

        if($this->roles->first()->name == "administrator" && $this->is_active == 1){

            return true;
        }

        return false;
    }

    public function clients(){

        return $this->belongsToMany('App\Client');
    }
}
