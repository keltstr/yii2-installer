<?php
	/**
	 * Created by PhpStorm.
	 * User: Abhimanyu
	 * Date: 08-02-2015
	 * Time: 12:05
	 */
	namespace abhimanyu\installer\helpers;

	use abhimanyu\installer\helpers\enums\Configuration as Enum;
	use Yii;
	use yii\caching\FileCache;

	class Configuration
	{
		/**
		 * Rewrites the configuration file
		 */
		public static function rewriteConfiguration()
		{
			// Get Current Configuration
			$config = Configuration::get();

			// Add Application Name to Configuration
			$config['name'] = Yii::$app->config->get(Enum::APP_NAME);

			// Add Caching
			$cacheClass = Yii::$app->config->get(Enum::CACHE_CLASS);
			if (!$cacheClass) {
				$cacheClass = FileCache::className();
			}
			$config['components']['cache'] = [
				'class' => $cacheClass
			];

			Configuration::set($config);
		}

		/**
		 * Returns the dynamic configuration file as array
		 *
		 * @return Array Configuration file
		 */
		public static function get()
		{
			$configFile = Yii::$app->params[Enum::CONFIG_FILE];
			$config     = require($configFile);

			if (!is_array($config))
				return [];

			return $config;
		}

		/**
		 * Sets configuration int the file
		 *
		 * @param array $config
		 */
		public static function set($config = [])
		{
			$configFile = Yii::$app->params[Enum::CONFIG_FILE];

			$content = "<" . "?php return ";
			$content .= var_export($config, TRUE);
			$content .= "; ?" . ">";

			file_put_contents($configFile, $content);

			if (function_exists('opcache_reset')) {
				opcache_invalidate($configFile);
			}
		}
	}