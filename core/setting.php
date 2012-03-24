<?php namespace ES;

use Laravel\Config;
use Laravel\Database;

class Setting {
	
	/**
	 * All of the active setting drivers.
	 *
	 * @var array
	 */
	public static $drivers = array();

	/**
	 * Get the setting driver instance.
	 *
	 * If no driver name is specified, the default will be returned.
	 *
	 * <code>
	 *		// Get the default setting driver instance
	 *		$driver = Setting::driver();
	 *
	 *		// Get a specific setting driver instance by name
	 *		$driver = Setting::driver('memcached');
	 * </code>
	 *
	 * @param  string        $driver
	 * @return Setting\Drivers\Driver
	 */
	public static function driver($driver = null)
	{
		if (is_null($driver)) $driver = Config::get('es::setting.driver');

		if ( ! isset(static::$drivers[$driver]))
		{
			static::$drivers[$driver] = static::factory($driver);
		}

		return static::$drivers[$driver];
	}

	/**
	 * Create a new setting driver instance.
	 *
	 * @param  string  $driver
	 * @return Setting\Drivers\Driver
	 */
	protected static function factory($driver)
	{
		if( ! $driver) $drive = Config::get('es::setting.driver');

		switch ($driver)
		{
			case 'memory':
				return new Setting\Drivers\Memory;

			case 'database':
				return new Setting\Drivers\Database(Database::connection());

			default:
				throw new \Exception("Setting driver {$driver} is not supported.");
		}
	}

	/**
	 * Magic Method for calling the methods on the default setting driver.
	 *
	 * <code>
	 *		// Call the "set" method on the default setting driver
	 *		Setting::set('site_status', 'maintenance');
	 * </code>
	 */
	public static function __callStatic($method, $parameters)
	{
		return call_user_func_array(array(static::driver(), $method), $parameters);
	}

}