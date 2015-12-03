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
	public $request;

	// Response

	// Events

	// Config

	public function __construct()
	{
		$this->serviceLocator = new ServiceLocator();
	}

	public function init()
	{
		// $fileParser = new FileParser();
		// $this->config = $fileParser->parseFilesAsJson('data\config');

		$this->router  = $this->serviceLocator->getService('core.router');
		$this->getRouter()->calculateRoute();

		$this->request = $this->serviceLocator->getService('core.request');

		set_error_handler(array($this->getServiceLocator()->getService('app.error.handler'), "handleError" ));

	}

	public function routeApp()
	{
		try {
			$this->getRouter()->route();
		} catch(\Exception $e) {
			$this->router->routeError($e);
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

	public function getRequest()
	{
		return $this->request;
	}

}