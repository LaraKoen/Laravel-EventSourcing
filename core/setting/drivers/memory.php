<?php namespace ES\Setting\Drivers;

class Memory {

	public $settings;

	public function get($key)
	{
		return array_key_exists($key, $this->settings) ? $this->settings[$key] : null;
	}

	public function set($key, $value)
	{
		$this->settings[$key] = $value;
	}

}