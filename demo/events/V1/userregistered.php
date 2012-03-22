<?php namespace Demo\Events\V1;

class UserRegistered {
	
	public $attributes;

	public function __construct($attributes)
	{
		$this->attributes = $attributes;
	}

}