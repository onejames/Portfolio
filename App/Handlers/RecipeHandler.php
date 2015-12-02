<?php

namespace App\Handlers;

use App\Handlers\AbstractHandler;

use App\Core\Article\RecipeArticle;
use App\Core\Tools\FileParser;
use Parsedown;

class RecipeHandler extends AbstractHandler
{

	public function getRecipeByName($name)
	{
		$recipe     = new RecipeArticle;
		$fileParser = new FileParser();
		$parsedown  = new Parsedown();

		$recipe = $fileParser->parseFileIntoObject('recipes/json/' . $name . '.json', $recipe, 'json');

		$content = $fileParser->getFileContents('recipes/markdown/' . $name . '.markdown', 'json');
		
		$recipe->setContent($parsedown->text($content));

		return $recipe;
	}

}