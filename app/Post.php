<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{


    protected $fillable = ['category_id','photo_id','user_id','title','body'];


    //each post belongs to a user
    public function user()
    {
        return $this->belongsTo('App\User');
    }

     //each post belongs to a pic
    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

  //each post belongs to a category
    public function Category()
    {
        return $this->belongsTo('App\Category');
    }


    public function comments()
    {
        return $this->hasMany('App\Comment');
    }


}
