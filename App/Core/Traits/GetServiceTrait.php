<?php

namespace App\Core\Traits;

use App\Core\Services\ServiceLocator;

trait GetServiceTrait
{
	
	public function get($serviceName)
	{
		global $app;

		$serviceLocator = $app->getServiceLocator();

		return $serviceLocator->getService($serviceName);
	}

}