
<?php 

ob_start();

use App\Router\Router;

include('App/Bootstrap.php');

$router = new Router();

$route = $router->calculateRoute();

$router->route($route);