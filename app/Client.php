<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function scopeIsactive($query) {
    	return $query->where('is_active', 1);
    }
}
