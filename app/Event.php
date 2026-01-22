<?php

namespace App;

use App\Primitive;
use Carbon\Carbon;

class Event extends Primitive
{
	protected $fillable = ['name', 'slug', 'description','start', 'finish', 'location', 'price', 'price_reduced', 'ticket_availability'];

    public function getStartAttribute()
    {
        return Carbon::parse($this->attributes['start']);
    }

    public function getFinishAttribute()
    {
        return Carbon::parse($this->attributes['finish']);
    }

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }

    public function sectors()
    {
        return $this->morphToMany('App\Sector', 'sectorable');
    }

    public function media()
    {
        return $this->morphMany('App\Media', 'mediable');
    }

    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }

    public function getUrlAttribute()
    {
        return url('eventi/'.$this->sectors()->first()->slug.'/'.$this->slug);
    }

    public function getImageAttribute()
    {
        return asset('storage/events/display/'.$this->media()->where('mime','image')->first()->filename);
    }

	public function getImageForPdfAttribute()
    {
		return storage_path('app/public/events/display/'.$this->media()->where('mime','image')->first()->filename);
        // return asset('storage/events/display/'.$this->media()->where('mime','image')->first()->filename);
    }


    public function getImageFullAttribute()
    {
        return asset('storage/events/full/'.$this->media()->where('mime','image')->first()->filename);
    }

    public function getFormattedPriceAttribute()
    {
        if($this->price)
        {
			return '€ '.str_replace('.', ',', sprintf('%01.2f', ($this->price/100)));
        }
        return null;
    }

    public function getNoCurrencyPriceAttribute()
    {
        if($this->price)
        {
            return $this->price/100;
        }
        return null;
    }


    public function getFormattedPriceReducedAttribute()
    {
        if($this->price_reduced)
        {
            setlocale(LC_MONETARY, 'it_IT');
            return money_format('%.2n', ($this->price_reduced/100) );
        }
        return null;

    }

}
