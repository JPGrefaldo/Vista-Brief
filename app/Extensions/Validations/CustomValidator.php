<?php 

namespace App\Extensions\Validations;

class CustomValidator extends \Illuminate\Validation\Validator {
	
	public function adminPasswordCheck($attribute, $value, $parameters)
	{
		return false;
	}
}