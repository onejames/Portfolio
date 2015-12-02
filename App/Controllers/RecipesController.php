<?php

namespace App\Controllers;

use App\Controllers\AbstractController;

class RecipesController extends AbstractController
{

	public function __construct()
	{
		$this->setHandler('App\Handlers\RecipeHandler');
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

			$this->setTemplate('recipes/recipes');

			$this->addCss('sections');
			$this->addJavascript('recipes');

			$this->setPageValues(
				array(
					'title'   => 'recipes',
				)
			);

		} else {

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

		$this->render();

	}

}
