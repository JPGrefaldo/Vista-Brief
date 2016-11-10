<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //

    public function attachment() 
    {
    	return $this->hasOne('App\Attachment', 'department_ids');
    }

    public function scopeIsactive($query) 
    {
    	return $query->where('is_active', 1);
    }

    public function scopeParentid($query, $id) {
    	return $query->where('parent_id', $id);
    }
}
