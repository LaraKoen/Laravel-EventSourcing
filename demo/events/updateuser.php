<?php namespace Demo\Events;

class UpdateUser {
	
	public $attributes;

	public function __construct($attributes)
	{
		$this->attributes = $attributes;
	}

}