<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    protected $dates = [
    	'pitch_quote_date',
    	'ideal_qa_date',
    	'ideal_review_date',
    	'project_deadline_date',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function client() 
    {
        return $this->belongsTo('App\Client');
    }

    public function jobstatus()
    {
        return $this->belongsTo('App\JobStatus');
    }

    public function formofresponse()
    {
        return $this->belongsTo('App\FormOfResponse', 'formatofresponse_id');
    }

    public function attachments() 
    {
    	return $this->hasMany('App\Attachment');
    }

    public function scopeIsactive($query) 
    {
    	return $query->where('is_active', 1);
    }
}
