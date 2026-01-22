<?php

namespace App;

use App\Primitive;

class Tag extends Primitive
{
    protected $fillable = ['name', 'slug', 'description'];

    public function articles()
    {
        return $this->morphedByMany('App\Article', 'taggable');
    }

    public function galleries()
    {
        return $this->morphedByMany('App\Gallery', 'taggable');
    }

    public function events()
    {
        return $this->morphedByMany('App\Event', 'taggable');
    }

    public function media()
    {
        return $this->morphMany('App\Media', 'mediable');
    }

    public static function onlyUsed()
    {
        $results = \DB::table('taggables')->select('tag_id')->distinct()->get();
        $arr = [];
        foreach ($results as $value) {
            $arr[] = $value->tag_id;
        }
        return Tag::whereIn('id', $arr)->get();
    }

    public function getUrlAttribute()
    {
        return url('tags/'.$this->slug);
    }

}
