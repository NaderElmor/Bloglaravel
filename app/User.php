<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','is_active','photo_id'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
      return $this->belongsTo('App\Role');
    }


    public function photo()
    {
      return $this->belongsTo('App\Photo');
    }

    //check if the user is admin or not
    public function isAdmin()
    {
        if($this->role['name'] == 'Admin' && $this->is_active == 1 ){
            return true;
        }else
        {
            return false;

        }
    }

    //each user has many posts
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function getGravatarAttribute()
    {
        $hash = md5(strtolower(trim($this->attributes['email']))) ."?d=mm";

        return "http://www.gravatar.com/avatar/$hash";

    }

}
