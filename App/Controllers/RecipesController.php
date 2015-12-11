<?php

namespace App\Controllers;

use App\Controllers\AbstractController;

class RecipesController extends AbstractController
{

	public function __construct()
	{
		$this->setHandler('App\Handlers\RecipeHandler');
	}

	public function processIndex()
	{
		$this->setTemplate('recipes/recipes');

		$this->addCss('sections');
		$this->addJavascript('recipes');

		$this->setPageValues(
			array(
				'title'   => 'recipes',
			)
		);
		
	}

	public function processRoute()
	{

		$this->setTemplate('recipes/recipesTemplate');
		$this->addCss('recipes');

		$recipe = $this->getHandler()->getRecipeByName($this->route->getPage());

		$this->setPageValues(
			array(
				'title'   => $recipe->getTitle(),
				'name'    => $recipe->getTitle(),
				'content' => $recipe->getContent(),
				'image'   => $recipe->getImage(),
			)
		);

	}

}
