<?php namespace Demo\Events;

class UserDeleted {
	
	public $attributes;

	public function __construct($attributes)
	{
		$this->attributes = $attributes;
	}

}