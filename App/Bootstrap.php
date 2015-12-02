<?php 

use App\Core\App;

include('Constants.php');

require 'vendor/autoload.php';

register_shutdown_function( "fatal_handler" );

$app = new App();

$app->init();

function fatal_handler() {
	$error = error_get_last();

	if($error == null) {
		return;
	}
	
	var_dump($error);die('fatil error handler');
}