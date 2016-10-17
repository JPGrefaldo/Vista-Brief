<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Brief extends Model
{
    //

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function scopeIsactive($request)
    {
    	return $request->where('is_active', 1);
    }
}
