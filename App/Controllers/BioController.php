<?php

namespace App\Controllers;

use App\Controllers\AbstractController;

class BioController extends AbstractController
{

	public function __construct()
	{
		$this->setHandler('App\Handlers\BioHandler');
	}

	public function process()
	{

		$this->setJavascript(
			array(
			)
		);

		$this->setCss(
			array(
				'bio'
			)
		);

		if( $this->route->getPage() == null ) {

			$this->setTemplate('bio/bio');
			
			$this->addJavascript('bio');

			$bio = $this->get('app.bio.handler')->getBio();
		
			$this->setPageValues(
				array(
					'title'   => 'Bio',
					'content' => $bio,
				)
			);

		} else {
		
			// $this->setTemplate('projects/projectTemplate');
			// $this->addCss('projects');

			// $project = $this->getHandler()->getProjectByName($this->route->getPage());

			// $this->setPageValues(
			// 	'content' => $project->getContent(),
			// );

		
		}
		



		$this->render();
	}

}