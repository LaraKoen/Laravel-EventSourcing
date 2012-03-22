<?php namespace Demo\Events;

class UserUpdated {
	
	public $attributes;

	public function __construct($attributes)
	{
		$this->attributes = $attributes;
	}

}