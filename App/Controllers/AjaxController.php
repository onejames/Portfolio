<?php

namespace App\Controllers;

use App\Controllers\AbstractController;

class AjaxController extends AbstractController
{

	public function process()
	{
		if($this->route->getPage() == null) {
			throw new \Exception('Ajax page must be specified');
		}

		$class 		= 'App\\Ajax\\' . ucfirst($this->route->getPage());
		
		if( class_exists($class)) {
			$controller = new $class();
		} else {
			throw new \Exception('Page ' . $route->controller . ' not found', 404);
		}
		
		$ajaxObject = new $class();

		echo $ajaxObject->toJson();

		die();
	}

	public function returnAjaxError($errorDto)
	{
		if(ob_get_contents() != null) {
			ob_clean();
		}

		echo json_encode($errorDto);
		exit;
	}

}