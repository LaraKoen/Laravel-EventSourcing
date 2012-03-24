<?php namespace ES\Setting\Drivers;

use Laravel\Config;
use Laravel\Database\Connection;

class Database {

	/**
	 * The database connection.
	 *
	 * @var Connection
	 */
	private $connection;

	/**
	 * Create a new database session driver.
	 *
	 * @param  Connection  $connection
	 * @return void
	 */
	public function __construct(Connection $connection)
	{
		$this->connection = $connection;
	}

	/**
	 * Get a session database query.
	 *
	 * @return Query
	 */
	private function table()
	{
		return $this->connection->table(Config::get('es::setting.database.table'));		
	}

	public function get($key)
	{
		$setting = $this->table()->where_key($key)->first();
		if(is_null($setting))
		{
			return null;
		}

		return unserialize($setting->value);
	}

	public function set($key, $value)
	{
		$setting = $this->table()->where_key($key)->first();

		if ( ! is_null($setting))
		{
			$this->table()->where_key($key)->update(
				array(
					'key' => $key,
					'value' => serialize($value)
				)
			);
		}
		else
		{
			$this->table()->insert(
				array(
					'key' => $key,
					'value' => serialize($value)
				)
			);
		}
	}

}