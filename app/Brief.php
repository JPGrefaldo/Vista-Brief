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

    public function client() 
    {
        return $this->belongsTo('App\Client');
    }

    public function projectstatus() 
    {
        return $this->belongsTo('App\ProjectStatus');
    }

    public function attachments() 
    {
        return $this->hasMany('App\Attachment');
    }

    public function attachmentsNotAmend() 
    {
        return $this->hasMany('App\Attachment')->isnotamend();
    }

    public function amendments() 
    {
        return $this->hasMany('App\Amendment');
    }

    public function amendments_desc() 
    {
        return $this->hasMany('App\Amendment')->desc();
    }

    public function scopeIsactive($request)
    {
    	return $request->where('is_active', 1);
    }
}
