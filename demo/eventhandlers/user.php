<?php

use ES\Bus;

Bus::register('es: Demo\Events\UserRegistered', function($event) {
	DB::table('users')->insert($event->attributes);
});

Bus::register('es: Demo\Events\UserUpdated', function($event) {
	DB::table('users')->where_uuid($event->attributes['uuid'])->update($event->attributes);
});

Bus::register('es: Demo\Events\UserDeleted', function($event) {
	DB::table('users')->where_uuid($event->attributes['uuid'])->delete();
});


/* 
	We can return some information about this eventhandler,
	this is handy when we are going to replay our eventlog
	and need to know what eventhandlers should be active
*/

return array(
	'title' => 'User Projectors',
	'description' => 'Project user data to tables'
);