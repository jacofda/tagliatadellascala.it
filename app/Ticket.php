<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['code', 'ticket_json', 'charge_response_id', 'user_id', 'event_id'];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function event()
	{
		return $this->belongsTo('App\Event');
	}

    public function media()
    {
        return $this->morphMany('App\Media', 'mediable');
    }

    public function getPdfAttribute()
    {
        return asset('storage/tickets/'.$this->media()->first()->filename);
    }

    public function getPdfFilenameAttribute()
    {
        return $this->media()->first()->filename;
    }

    public function getTotalAttribute()
    {	
    	$total = 0;
    	foreach( json_decode($this->ticket_json) as $type => $quantity )
    	{
    		if ( $type == "Intero" )
    		{
    			$total += Event::find($this->event_id)->price * $quantity;
    		}
    		if ( $type == "Ridotto" )
    		{
    			$total += Event::find($this->event_id)->price_reduced * $quantity;
    		}
    	}
    	return number_format($total/100, '2', ',', '');
    }

    public function getValidForAttribute()
    {	
    	$total = '';
    	foreach( json_decode($this->ticket_json) as $type => $quantity )
    	{
    		if ( $type == "Intero" )
    		{	
    			if ($quantity > 1)
    			{
    				$total .=  $quantity . ' ingressi con biglietto intero';
    			}
    			else
    			{
    				$total .=  $quantity . ' ingresso con biglietto intero';
    			}
    			
    		}
    		if ( $type == "Ridotto" )
    		{
    			if ($quantity > 1)
    			{
    				$total .=  ' e ' . $quantity . ' ingressi con biglietto ridotto ';
    			}
    			else
    			{
    				$total .=  ' e ' . $quantity . ' ingresso con biglietto ridotto ';
    			}
    		}
    	}
    	return $total;
    }

}
