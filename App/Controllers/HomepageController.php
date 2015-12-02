<?php

namespace App\Controllers;

use App\Controllers\AbstractController;

class HomepageController extends AbstractController
{

	public function process()
	{
		$this->setPageValues(
			array(
				'title' => '',
			)
		);

		$this->setTemplate('homepage');

		$this->setJavascript(
			array(
				'homepage', 
			)
		);

		$this->setCss(
			array(
				'homepage',
				'sections'
			)
		);

		$this->render();

	}

}