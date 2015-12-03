<?php

namespace App\Core\Factories;

use App\Core\Interfaces\IsFactory;
use App\Core\Services\ServiceLocator;

use App\Core\Request;

class RequestFactory implements IsFactory
{
	
	public function create(ServiceLocator $serviceLocator)
	{
		return new Request($serviceLocator->getService('core.router')->getRoute());
	}

}