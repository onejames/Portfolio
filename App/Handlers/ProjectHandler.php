<?php

namespace App\Handlers;

use App\Handlers\AbstractHandler;

use App\Core\Article\ProjectArticle;
use App\Core\Tools\FileParser;
use Parsedown;

class ProjectHandler extends AbstractHandler
{

	public function getProjectDetailsList()
	{
		$fileParser = new FileParser('projects/json');
		$projects   = $fileParser->parseFiles('json');

		foreach ($projects as $key => $value) {
			$projects[$key]->image = IMG_PATH . 'projects/' . $value->image;
		}

		foreach ($projects as $key => $value) {
			$projects[$key]->link = DOMAIN . 'projects/' . $value->link;
		}

		return $projects;
	}

	public function getProjectByName($name)
	{
		$project    = new ProjectArticle;
		$fileParser = new FileParser();
		$parsedown  = new Parsedown();

		if(! $fileParser->fileExists('projects/json/' . $name . '.json')) {
			throw new \Exception('Project does not exist', 404);
		}

		$project = $fileParser->parseFileIntoObject('projects/json/' . $name . '.json', $project, 'json');

		$content = $fileParser->getFileContents('projects/markdown/' . $name . '.markdown', 'json');
		
		$project->setContent($parsedown->text($content));

		return $project;
	}

}