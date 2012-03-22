<?php

use ES\Bus;
use ES\Libraries\UUID;

use Demo\Events\RegisterUser;
use Demo\Events\UpdateUser;
use Demo\Events\DeleteUser;

class Demo_Users_Controller extends Controller {
	
	public $restful = true;

	public function __construct()
	{
		Asset::container('header')->bundle('demo')->add('style', 'css/style.css');
	}

	public function get_index()
	{
		$users = DB::table('users')->get();
		return View::make('demo::users.index')->with('users', $users);
	}

	public function get_add()
	{
		return View::make('demo::users.add');
	}

	public function post_add()
	{
		$data = array(
			'uuid' => UUID::generate(),
			'first_name' => Input::get('first_name'),
			'last_name' => Input::get('last_name')
		);
		Bus::publish(new RegisterUser($data));

		return Redirect::to('demo/users/index')->with('message', 'Successfully added user');
	}

	public function get_edit($uuid)
	{
		$user = DB::table('users')->where_uuid($uuid)->first();

		return View::make('demo::users.edit')->with('user', $user);
	}

	public function put_edit()
	{
		$data = array(
			'uuid' => Input::get('uuid'),
			'first_name' => Input::get('first_name'),
			'last_name' => Input::get('last_name')
		);
		Bus::publish(new UpdateUser($data));
		
		return Redirect::to('demo/users/index')->with('message', 'Successfully edited user');
	}

	public function get_delete($uuid)
	{
		$user = DB::table('users')->where_uuid($uuid)->first();

		return View::make('demo::users.delete')->with('user', $user);
	}

	public function put_delete()
	{
		$data = array(
			'uuid' => Input::get('uuid')
		);
		Bus::publish(new DeleteUser($data));

		return Redirect::to('demo/users/index')->with('message', 'Successfully deleted user');
	}

}