<?php 

use App\Core\App;

include('Constants.php');

require 'vendor/autoload.php';

$app = new App();

$app->init();

$app->routeApp();

define('EVERYTHING_WENT_OK', true);