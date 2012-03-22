<?php

Route::controller('demo::users');

ES\EventHandlers::register(array(
	__DIR__.DS.'eventhandlers'
));

Autoloader::namespaces(array(
	'Demo' => __DIR__
));