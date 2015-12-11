<?php

namespace App\Controllers;

use App\Controllers\AbstractController;

class ProjectsController extends AbstractController
{

	public function __construct()
	{
		$this->setHandler('App\Handlers\ProjectHandler');
	}

	public function processRoute()
	{
		$this->setTemplate('projects/projectTemplate');

		$this->setCss(
			array(
				'projects',
			)
		);

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

	public function processIndex()
	{
		$this->setTemplate('projects/project');

		$this->setJavascript(
			array(
				'projects',
			)
		);

		$this->setCss(
			array(
				'projects',
				'sections',
			)
		);
			
		$this->setPageValues(
			array(
				'title' => 'Projects',
			)
		);
	}

}