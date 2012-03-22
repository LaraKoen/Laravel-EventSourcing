<?php namespace ES;

class Bus {
	
	public static function register($channel, $callback)
	{
		Message::subscribe($channel, $callback);
	}

	public static function publish($event)
	{
		$identifier = get_class($event);
		EventStore::save_events($event->attributes['uuid'], $event);
		Message::publish("es: {$identifier}", array($event));
	}

}