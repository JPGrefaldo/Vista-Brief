<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResetPasswordRequest extends Model
{
    protected $table = "reset_password_request";

    public function scopeIsrequested($query) {
    	return $query->where('state', 1);
    }
}
