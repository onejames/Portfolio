<?php

namespace App\Controllers;

use App\Controllers\AbstractController;

use App\Core\Interfaces\ToJson;

class AjaxController extends AbstractController
{

	public function processRoute()
	{

		$class 		= 'App\\Ajax\\' . ucfirst($this->route->getPage());
		
		if( class_exists($class)) {
			$controller = new $class();
		} else {
			throw new \Exception('Page ' . $route->controller . ' not found', 404);
		}
		
		$ajaxObject = new $class();

		if($ajaxObject instanceof ToJson) {
			echo $ajaxObject->toJson();
		} else {
			$ajaxObject->processAjax($this->route);
		}

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