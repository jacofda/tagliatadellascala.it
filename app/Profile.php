<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['nome', 'cognome', 'email', 'telefono', 'phone', 'user_id'];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function getFullNameAttribute()
	{
		return $this->nome . ' ' . $this->cognome;
	}
    
}