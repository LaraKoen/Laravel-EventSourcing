<?php namespace Demo\Events\V1;

class UserDeleted {
	
	public $attributes;

	public function __construct($attributes)
	{
		$this->attributes = $attributes;
	}

}