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
		$ajaxObject = new $class();

		echo $ajaxObject->toJson();

		die();
	}

}