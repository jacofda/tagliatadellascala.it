<?php

namespace App;

use App\Primitive;

class Article extends Primitive
{
    protected $fillable = ['name', 'slug', 'description'];

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
        return url('articoli/'.$this->sectors()->first()->slug.'/'.$this->slug);
    }

    public function getImageAttribute()
    {
        return asset('storage/articles/display/'.$this->media()->where('mime','image')->first()->filename);
    }

}
