<?php

namespace App;

use App\Primitive;

class Sector extends Primitive
{
    protected $fillable = ['name', 'slug', 'description'];
    public $timestamps = false;

    public function events()
    {
        return $this->morphedByMany('App\Event', 'sectorable');
    }

    public function articles()
    {
        return $this->morphedByMany('App\Article', 'sectorable');
    }

    public function galleries()
    {
        return $this->morphedByMany('App\Gallery', 'sectorable');
    }

}