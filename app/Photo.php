<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['file'];

    protected  $imagesFolder ='/images/';

    public function getFileAttribute($photo)
    {
        return $this->imagesFolder.$photo;
    }
}
