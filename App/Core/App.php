<?php

namespace App\Core;

use App\Core\Services\ServiceLocator;
use App\Core\Tools\FileParser;

class App
{

	// Service Locator
	public $serviceLocator;

	// Router
	public $router;

	// Request

	// Response

	// Events

	// Config

	public function __construct()
	{
		$this->serviceLocator = new ServiceLocator();
	}

	public function init($route = true)
	{
		// $fileParser = new FileParser();
		// $this->config = $fileParser->parseFilesAsJson('data\config');

		$this->router = $this->serviceLocator->getService('app.core.router');

		$this->getRouter()->calculateRoute();

		if($route) {
			try {
				$this->getRouter()->route();
			} catch(\Exception $e) {
				$this->router->routeError($e);
			}
		}
	}

	public function getServiceLocator()
	{
		return $this->serviceLocator;
	}

	public function getRouter()
	{
		return $this->router;
	}

}