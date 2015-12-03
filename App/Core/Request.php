<?php

namespace App\Core;

use App\Core\Interfaces\IsService;
use App\Core\Traits\ServiceTrait;
use App\Core\Traits\GetServiceTrait;

use App\Router\Route;

class Request implements IsService
{
	
	use ServiceTrait;
	
	use GetServiceTrait;

	private $method;

	private $type;

	CONST AJAX = 'ajax';

	CONST PAGE_REQUEST = 'pageRequest';

	public function __construct(Route $route)
	{

		$this->type   = ($route->controller == 'ajax' ? $this::AJAX : $this::PAGE_REQUEST);

		$this->method = $_SERVER['REQUEST_METHOD'];

	}

	public function getType()
	{
		return $this->type;
	}

	public function getMethod()
	{
		return $this->method;
	}

}