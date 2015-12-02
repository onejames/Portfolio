<?php

namespace App\Controllers;

use App\Controllers\AbstractController;

class ProjectsController extends AbstractController
{

	public function __construct()
	{
		$this->setHandler('App\Handlers\ProjectHandler');
	}

	public function process()
	{

		$this->setJavascript(
			array(
			)
		);

		$this->setCss(
			array(
			)
		);

		if( $this->route->getPage() == null ) {

			$this->setTemplate('projects/project');
			
			$this->addCss('sections');
			$this->addCss('projects');
			$this->addJavascript('projects');
		
			$this->setPageValues(
				array(
					'title' => 'Projects',
				)
			);

		} else {
		
			$this->setTemplate('projects/projectTemplate');
			$this->addCss('projects');

			$project = $this->getHandler()->getProjectByName($this->route->getPage());

			$this->setPageValues(
				array(
					'title'   => $project->getTitle(),
					'name'    => $project->getTitle(),
					'content' => $project->getContent(),
					'image'   => $project->getImage(),
				)
			);

		
		}
		



		$this->render();
	}

}