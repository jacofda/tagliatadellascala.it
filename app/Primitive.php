<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Primitive extends Model
{
	 use Sluggable, SluggableScopeHelpers;

    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getCentocinquantaAttribute()
    {
        $description = strip_tags($this->description);

        if ( strlen($description) > 246 )
        {
            $pos = strpos($description, ' ', 245);
            return substr($description, 0, $pos).' ...';
        }

        return $description;
    }


    public static function onlyUsedTags($model)
    {
        $results = \DB::table('taggables')->select('tag_id')->where('taggable_type', $model)->distinct()->get();
        $arr = [];
        foreach ($results as $value) {
            $arr[] = $value->tag_id;
        }
        return Tag::whereIn('id', $arr)->get();
    }

    public function getHasImageAttribute()
    {
        if ($this->media()->where('mime','image')->exists() )
        {
            return true;
        }
        return false;
    }

    public function getClassAttribute()
    {

        if( get_class($this) == 'App\Gallery' )
        {
            return "Galleria";
        }
        elseif ( get_class($this) == 'App\Event' )
        {
            return "Evento";
        }
        elseif ( get_class($this) == 'App\Article' )
        {
            return "News";
        }

        return 'todo';

    }

}
