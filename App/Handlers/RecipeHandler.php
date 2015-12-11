<?php

namespace App\Handlers;

use App\Handlers\AbstractHandler;

use App\Core\Article\RecipeArticle;
use App\Core\Tools\FileParser;

class RecipeHandler extends AbstractHandler
{

	public function getRecipeByName($name)
	{
		$recipe     = new RecipeArticle;
		$fileParser = new FileParser();

		$recipe = $fileParser->parseFileIntoObject('recipes/json/' . $name . '.json', $recipe, 'json');

		$content = $fileParser->getFileContents('recipes/markdown/' . $name . '.markdown', 'json');
		
		$recipe->setContent($content);

		return $recipe;
	}

}