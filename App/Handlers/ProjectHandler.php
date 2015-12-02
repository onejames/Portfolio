<?php

namespace App\Handlers;

use App\Handlers\AbstractHandler;

use App\Core\Article\RecipeArticle;
use App\Core\Tools\FileParser;
use Parsedown;

class ProjectHandler extends AbstractHandler
{

	public function getProjectByName($name)
	{
		$recipe     = new RecipeArticle;
		$fileParser = new FileParser();
		$parsedown  = new Parsedown();

		$recipe = $fileParser->parseFileIntoObject('projects/json/' . $name . '.json', $recipe, 'json');

		$content = $fileParser->getFileContents('projects/markdown/' . $name . '.markdown', 'json');
		
		$recipe->setContent($parsedown->text($content));

		return $recipe;
	}

}