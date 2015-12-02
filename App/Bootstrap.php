<?php 

include('Constants.php');

require 'vendor/autoload.php';

register_shutdown_function( "fatal_handler" );

function fatal_handler() {
	$error = error_get_last();

	if($error == null) {
		return;
	}
	
	var_dump($error);die();
}