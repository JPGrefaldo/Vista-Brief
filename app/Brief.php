<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Brief extends Model
{
    protected $dates = [
    	'quoted_required_by_at', 
    	'proposal_required_by_at', 
    	'firststage_required_by_at',
    	'project_delivered_by_at'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function scopeIsactive($request)
    {
    	return $request->where('is_active', 1);
    }
}
