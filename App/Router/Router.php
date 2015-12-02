<?php

namespace App\Router;

use App\Router\Route;

class router
{

	private $route;

	public function __construct()
	{
		$this->route = new Route();
	}

	public function calculateRoute($routeString = null)
	{
		$routes   = array();
		$base_url =  ( $routeString == null ? $this->getCurrentUri() : $routeString );
		
		$exploded = explode('/', $base_url);
		foreach($exploded as $route)
		{
			if(trim($route) != '') {
				array_push($routes, $route);
			}
		}
	 
		$this->route->init($routes);

		return $this->route;
	}

	public function route(Route $route = null)
	{
		if($route == null) {
			$route = $this->route;
		}

		if($route == null) {
			throw new \Exception('Cant route with out a route');
		}

		if($route->controller == null) {
			$route->controller = 'homepage';
		}
		
		try {
			$class 		= 'App\\Controllers\\' . ucfirst($route->controller) . 'Controller';
			$controller = new $class();
		} catch (\Exception $e) {
			$this->routeError($e);
		}

		$controller->controll($route);

	}

	private function getBasePath()
	{
		return implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';;
	}

	/*
	The following function will strip the script name from URL i.e.  http://www.something.com/search/book/fitzgerald will become /search/book/fitzgerald
	*/
	private function getCurrentUri()
	{
		$basepath = $this->getBasePath();
		$uri      = substr($_SERVER['REQUEST_URI'], strlen($basepath));
		
		if (strstr($uri, '?')) {
			$uri = substr($uri, 0, strpos($uri, '?'));
		}
		
		$uri = '/' . trim($uri, '/');

		return $uri;
	}

	public function routeError(Exception $e)
	{
		// var_dump($e);
	}

}