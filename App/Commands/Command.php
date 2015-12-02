<?php

namespace App\Commands;

class Command 
{
	private $app;

	private $commandArgs;

	public function __construct($app, $commandArgs)
	{
		$this->app         = $app;
		$this->commandArgs = $commandArgs;
	}

	public function exists()
	{
		return false;
	}
}