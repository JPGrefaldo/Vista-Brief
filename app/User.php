<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
	use \Illuminate\Auth\Authenticatable;

	public function isAdmin() {
		if ($this->type == 1) {
			return true;
		}
		return false;
	}
}
