<?php

use Doctrine\Common\ClassLoader;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\Cache\ArrayCache;
use Doctrine\DBAL\Logging\EchoSQLLogger;
use Symfony\Component\Console;
use Doctrine\ORM\Tools\Setup;

if (! defined('APPPATH')) {
	define('APPPATH', str_replace('third_party' . DIRECTORY_SEPARATOR . 'DoctrineORM-2.2.2' . DIRECTORY_SEPARATOR . 'libraries', '', dirname(__FILE__)));
}

/**
 * @property \Doctrine\ORM\EntityManager $em Gerenciador de Entidade
 */

class Doctrine

{

	public $em = '';

	public function __construct()
	{

		//Set up class loading. You cold use different autoloaders, provider by your
		//if you want to.
		require_once APPPATH . 'third_party/DoctrineORM-2.2.2/libraries/Doctrine/Common/ClassLoader.php';
		require_once APPPATH . 'third_party/DoctrineORM-2.2.2/libraries/Doctrine/ORM/Tools/Setup.php';

		Doctrine\ORM\Tools\Setup::registerAutoloadDirectory(APPPATH . 'third_party/DoctrineORM-2.2.2/libraries/');

		$doctrineClassLoader = new ClassLoader('Doctrine', APPPATH . 'third_party/DoctrineORM-2.2.2/libraries');
		$doctrineClassLoader->register();

		$proxiesClassLoader = new ClassLoader('Proxies', APPPATH . 'models/proxies');
		$proxiesClassLoader->register();

		//Set up caches
		$config = new Configuration;
		$cache = new ArrayCache;
		$config->setMetadataCacheImpl($cache);
		$driverImpl = $config->newDefaultAnnotationDriver([APPPATH . 'models/Entities']);
		$config->setMetadataDriverImpl($driverImpl);
		$config->setQueryCacheImpl($cache);

		//Proxy configuration
		$config->setProxyDir(APPPATH . '/models/proxies');
		$config->setProxyNamespace('Proxies');

		//Set up logger
		//$logger = new EchoSQLLogger;
		//$config->setSQLLogger($logger);
		$config->setAutoGenerateProxyClasses(true);
		include APPPATH . 'config/database.php';

		//Database connection information
		$connectionOptions = [
			'driver' => 'pdo_mysql',
			'user' => $db['default']['username'],
			'password' => $db['default']['password'],
			'host' => $db['default']['hostname'],
			'dbname' => $db['default']['database'],
			'charset' => $db['default']['char_set'],
			'driverOptions' => [1002 => 'SET NAMES utf8']
		];

		//Enforce connection character set. This is very important if you are
		//using MySQL and InnoDB tables!
		//Doctrine_Manager::connection()->setCharset('utf8');
		//Doctrine_Manager::connection()->setCollate('utf8_general_ci');
		//Create EntityManager
		$this->em = EntityManager::create($connectionOptions, $config);

	}

}
