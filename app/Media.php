<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['description', 'mime', 'filename', 'mediable_id', 'mediable_type' ];
	public $table = 'media';

    public function mediable()
    {
        return $this->morphTo();
    }
}
