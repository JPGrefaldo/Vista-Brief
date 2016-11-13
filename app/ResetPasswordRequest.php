<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResetPasswordRequest extends Model
{
    protected $table = "reset_password_request";

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function scopeIsrequested($query) {
    	return $query->where('state', 1);
    }
}
