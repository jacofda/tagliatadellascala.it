<?php

namespace App;

use App\Primitive;

class Video extends Primitive
{
    protected $fillable = ['name', 'slug', 'description', 'youtube'];

    public function sectors()
    {
        return $this->morphToMany('App\Sector', 'sectorable');
    }

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }

    public function media()
    {
        return $this->morphMany('App\Media', 'mediable');
    }

    public function getUrlAttribute()
    {
        return url('video/'.$this->sectors()->first()->slug.'/'.$this->slug);
    }

}
