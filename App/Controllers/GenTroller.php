<?php

namespace App\Controllers;

use App\Controllers\AbstractController;
use App\Core\Interfaces\IsService;
use App\Core\Traits\ServiceTrait;

class GenTroller extends AbstractController implements IsService
{
	use ServiceTrait;

	public function __construct()
	{
		$this->setHandler('App\Handlers\GenHandler');
	}

	public function process()
	{
		
	}

	public function renderError($errorDto)
	{
		$this->setPageValues(
			array(
				'title'      => $errorDto->title,
				'status'     => $errorDto->status,
				'errorTitle' => $errorDto->title,
				'detail'     => $errorDto->detail,
			)
		);

		$this->setTemplate('error');

		$this->setJavascript(
			array(
			)
		);

		$this->setCss(
			array(
				'error'
			)
		);

		$this->render();
	}

}