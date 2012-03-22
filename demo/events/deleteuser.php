<?php namespace Demo\Events;

class DeleteUser {
	
	public $attributes;

	public function __construct($attributes)
	{
		$this->attributes = $attributes;
	}

}