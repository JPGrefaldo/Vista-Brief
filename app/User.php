<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
	use \Illuminate\Auth\Authenticatable;

	public function isAdmin() 
	{
		if ($this->type == 1) {
			return true;
		}
		return false;
	}

	public function scopeUsername($query, $username) 
	{
		return $query->where('username', $username);
	}

	public function scopeIsactive($query) 
	{
		return $query->where('is_active', 1);
	}

	public function scopeIsadmin($query)
	{
		return $query->where('type', 1);
	}
}
