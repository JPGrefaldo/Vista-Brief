<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function scopeIsactive($query) 
    {
    	return $query->where('is_active', 1);
    }

    public function scopeLatest($query) 
    {
    	return $query->orderBy('id', 'desc');
    }
}
