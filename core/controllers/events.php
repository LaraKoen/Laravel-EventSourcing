<?php

use ES\EventStore;

class ES_Events_Controller extends Controller {
	
	public $restful = true;

	public function get_index()
	{
		Asset::container('header')->bundle('es')->add('style', 'css/style.css');
		$events = EventStore::all(Input::get('start', 0), 10);
		
		return View::make('es::events.index')->with('events', $events);
	}

}