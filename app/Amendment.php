<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amendment extends Model
{
    public function brief() 
    {
    	return $this->belongsTo('App\Brief');
    }

    public function user() 
    {
    	return $this->belongsTo('App\User');
    }

    public function attachments() 
    {
    	return $this->hasMany('App\Attachment');
    }

    public function scopeIsactive($query) 
    {
        return $query->where('is_active', 1);
    }

    public function scopeDesc($query) 
    {
        return $query->orderBy('id', 'desc');
    }
}
