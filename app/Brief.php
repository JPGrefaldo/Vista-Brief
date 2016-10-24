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

    public function scopeOrWhereProjectStatus($query, $keyword) 
    {
        $projectstatus = \App\ProjectStatus::select('id')
            ->where('name', 'LIKE', '%'.$keyword.'%')
            ->get();

        foreach ($projectstatus as $status) {
            $query->orWhere('projectstatus_id', '=', $status->id);
        }

        return $query;
    }

    public function scopeOrWhereStatus($query, $keyword) 
    {
        if ( strtolower($keyword) == 'submitted' ) {
            return $query->orWhere('is_draft', '=', 0);
        }
        else if( strtolower($keyword) == 'draft' ) {
            return $query->orWhere('is_draft', '=', 1);
        }
        
        return $query;
    }

    public function scopeWhereDeparmentWithArray($query, $arr_deparment_id) 
    {
        if (empty($arr_deparment_id))
            return $query;
        foreach ($arr_deparment_id as $id) {
            $query->whereRaw('FIND_IN_SET('.$id.', disciplines_required_ids)');
        }
        return $query;
    }
}
