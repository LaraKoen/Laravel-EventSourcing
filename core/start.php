<?php

Autoloader::namespaces(array(
	'ES' => __DIR__
));

use ES\EventHandlers;

Route::controller('es::events');

if($allowed_events = Input::get('allowed_events'))
{
	EventHandlers::$allowed_events = $allowed_events;
}