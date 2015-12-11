<?php

namespace App\Controllers;

use App\Controllers\AbstractController;

class BioController extends AbstractController
{

	public function __construct()
	{
		$this->setHandler('App\Handlers\BioHandler');
	}

	public function processIndex()
	{

		$this->setJavascript(
			array(
				'bio'
			)
		);

		$this->setCss(
			array(
				'bio'
			)
		);

		$this->setTemplate('bio/bio');
		
		$bio = $this->get('app.bio.handler')->getBio();
	
		$this->setPageValues(
			array(
				'title'   => 'Bio',
				'content' => $bio,
			)
		);

		$this->render();
	}

}