<?php

namespace App\Core\Interfaces;

use App\Core\Services\ServiceLocator;

interface IsFactory
{

	public function create(ServiceLocator $serviceLocator);

}