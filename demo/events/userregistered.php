<?php namespace Demo\Events;

class UserRegistered {
	
	public $attributes;

	public function __construct($attributes)
	{
		$this->attributes = $attributes;
	}

}