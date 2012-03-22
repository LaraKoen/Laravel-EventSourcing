<?php namespace Demo\Events;

class RegisterUser {
	
	public $attributes;

	public function __construct($attributes)
	{
		$this->attributes = $attributes;
	}

}