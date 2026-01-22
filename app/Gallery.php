<?php

namespace App;

use App\Primitive;

class Gallery extends Primitive
{
    protected $fillable = ['name', 'slug', 'description'];

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }

    public function media()
    {
        return $this->morphMany('App\Media', 'mediable');
    }

    public function sectors()
    {
        return $this->morphToMany('App\Sector', 'sectorable');
    }

    public function getUrlAttribute()
    {
        return url('gallerie/'.$this->sectors()->first()->slug.'/'.$this->slug);
    }

    public function getImageAttribute()
    {
        return asset('storage/galleries/display/'.$this->media()->where('mime','image')->first()->filename);
    }

    public function getImageFullAttribute()
    {
        return asset('storage/galleries/full/'.$this->media()->where('mime','image')->first()->filename);
    }
   
}
