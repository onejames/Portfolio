<?php 

namespace App\Core\Services;

use App\Core\Interfaces\IsFactory;
use App\Core\Interfaces\IsService;

class ServiceLocator
{

	private $usedClasses = array();

	private $factory = array(
		'App\Core\Request' => 'App\Core\Factories\RequestFactory'
	);

	private $alias = array(
		'core.router'            => 'App\Router\Router',
		'core.request'           => 'App\Core\Request',
		
		'core.tools.fileparser'  => 'App\Core\Tools\FileParser',
		'core.tools.hydrator'    => 'App\Core\Tools\Hydrator',
		
		'app.bio.controller'     => 'App\Controllers\GenTroller',
		'app.general.controller' => 'App\Controllers\GenTroller',
		'app.ajax.controller'    => 'App\Controllers\AjaxController',

		'app.error.handler'      => 'App\Handlers\ErrorHandler',
		'app.bio.handler'        => 'App\Handlers\GenHandler',
		'app.general.handler'    => 'App\Handlers\GenHandler',
		'app.project.handler'    => 'App\Handlers\ProjectHandler',
		'app.recipe.handler'     => 'App\Handlers\RecipeHandler',
	);

	private $nonpersistant = array(
		'App\Core\Tools\FileParser',
	);

	public function __construct($config = null)
	{
		$this->config = $config;
	}

	public function getService($serviceName)
	{
		if(!isset($this->alias[$serviceName]) && !isset($this->service[$serviceName])) {
			throw new \Exception('Service ' . $serviceName . ' does not exist');
		}

		$isAlias    = isset($this->alias[$serviceName]);
		$className  = ( $isAlias ? $this->alias[$serviceName] : $serviceName);
		$hasFactory = isset($this->factory[$className]);


		if(isset($this->nonpersistant[$className])) {
			
			$classObject = new $className();
		
		} else if(isset($this->usedClasses[$className])) {
			
			$classObject = $this->usedClasses[$className];
		
		} else if($hasFactory) {
			
			$factoryName = $this->factory[$className];

			// TODO: check for infinite loop
			$factory     = new $factoryName();

			if( !$factory instanceof IsFactory ) {
				throw new \Exception('Regestered factory ' . get_class($factory) . ' is not a factory');
			}

			$classObject = $factory->create($this);

		} else {

			$classObject = new $className();
			$this->usedClasses[$className] = $classObject;

		}

		if( !$classObject instanceof IsService ) {
			throw new \Exception('Class ' . get_class($classObject) . ' is not a valid service');
		}

		$classObject->setServiceName($serviceName);

		return $classObject;
	}

}