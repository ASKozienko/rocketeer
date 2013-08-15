<?php
namespace Rocketeer\Facades;

use Illuminate\Support\Facades\Facade;
use Rocketeer\RocketeerServiceProvider;

/**
 * Facade for Rocketeer's CLI
 */
class Console extends Facade
{
	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor()
	{
		if (!static::$app) {
			$base = explode('/vendor', __DIR__);
			$base = $base[0];

			static::$app = RocketeerServiceProvider::make();
			static::$app['path.base'] = $base;
		}

		return 'rocketeer.console';
	}
}
