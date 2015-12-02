<?php

use App\Core\App;
use App\Router\Router;
use App\Commands\Command;

include('App\Constants.php');

require 'vendor/autoload.php';

$app = new App();

$app->init(false);

//App is now initalised but not routed. access $app for services.

$command = new Command($app, $argv);

if(!$command->exists()) {
	throw new Exception("command does not exist");
}

$realCommand = $command->getRequestedCommand($command);

$realCommand->process();