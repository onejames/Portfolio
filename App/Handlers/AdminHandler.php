<?php

namespace App\Handlers;

use App\Handlers\AbstractHandler;

use App\Core\Article\RecipeArticle;
use App\Core\Tools\FileParser;
use Parsedown;

class AdminHandler extends AbstractHandler
{

	public function getRecipeList()
	{
		$fileParser = new FileParser('recipes\\markdown\\');

		$recipeFiles = $fileParser->getFileNames();

		$content = '';

		foreach ($recipeFiles as $fileName) {
			$name = str_replace('.markdown', '', $fileName);
			$name = str_replace('_', ' ', $name);
			$name = ucwords($name);

			$content .= '<div class="surge-column-1 surge-column-tablet-1/2 surge-column-desktop-1/3"> 
							<a href="' . DOMAIN . 'admin/recipes/markdown/' . $fileName . '" >
								' . $name . '
							</a> 
						</div>';
		}

		return $content;
	}

	public function getProjectList()
	{
		$fileParser = new FileParser('projects\\markdown\\');

		$recipeFiles = $fileParser->getFileNames();

		$content = '';

		foreach ($recipeFiles as $fileName) {
			$name = str_replace('.markdown', '', $fileName);
			$name = str_replace('_', ' ', $name);
			$name = ucwords($name);

			$content .= '<div class="surge-column-1 surge-column-tablet-1/2 surge-column-desktop-1/3"> 
							<a href="' . DOMAIN . 'admin/projects/markdown/' . $fileName . '" >
								' . $name . '
							</a> 
						</div>';
		}

		return $content;
	}

	public function getMarkdown($path)
	{
		$fileParser = new FileParser();

		return $fileParser->getFileContents($path);
	}

	public function getProperties($path)
	{
		$fileParser = new FileParser();

		return $fileParser->parseFile($path);
	}

	public function getArticleByPath()
	{
		$recipe = new RecipeArticle;

		return $recipe;
	}

}