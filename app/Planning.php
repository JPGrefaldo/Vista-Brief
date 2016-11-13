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

    public function scopeLatest($request) 
    {
        return $request->orderBy('id', 'desc');
    }

    public function scopeOrWhereUser($query, $keyword) 
    {
        $users = \App\User::select('id')
            ->where('forename','LIKE','%'.$keyword.'%')
            ->orWhere('surname','LIKE','%'.$keyword.'%')
            ->orWhere('email','LIKE','%'.$keyword.'%')
            ->get();

        foreach ($users as $user) {
            $query->orWhere('user_id', '=', $user->id);
        }

        return $query;
    }

    public function scopeOrWhereClient($query, $keyword) 
    {
        $clients = \App\Client::select('id')
            ->where('name','LIKE','%'.$keyword.'%')
            ->get();

        foreach ($clients as $client) {
            $query->orWhere('client_id', '=', $client->id);
        }

        return $query;
    }

    public function scopeOrWhereJobStatus($query, $keyword) 
    {
        $jobstatus = \App\JobStatus::select('id')
            ->where('name', 'LIKE', '%'.$keyword.'%')
            ->get();

        foreach ($jobstatus as $status) {
            $query->orWhere('jobstatus_id', '=', $status->id);
        }

        return $query;
    }

    public function scopeOrWhereFormatOfResponse($query, $keyword) 
    {
        $formatofresponse = \App\FormOfResponse::select('id')
            ->where('name', 'LIKE', '%'.$keyword.'%')
            ->get();

        foreach ($formatofresponse as $format) {
            $query->orWhere('formatofresponse_id', '=', $format->id);
        }

        return $query;
    }
}
