<?php

Autoloader::namespaces(array(
	'ES' => __DIR__
));

use ES\EventHandlers;

Route::controller(array(
	'es::events',
	'es::eventhandlers'
));

if($allowed_events = Input::get('allowed_events'))
{
	EventHandlers::$allowed_events = $allowed_events;
}