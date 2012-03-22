<?php

use ES\Bus;

Bus::register('es: Demo\Events\RegisterUser', function($event) {
	DB::table('users')->insert($event->attributes);
});

Bus::register('es: Demo\Events\UpdateUser', function($event) {
	DB::table('users')->where_uuid($event->attributes['uuid'])->update($event->attributes);
});

Bus::register('es: Demo\Events\DeleteUser', function($event) {
	DB::table('users')->where_uuid($event->attributes['uuid'])->delete();
});