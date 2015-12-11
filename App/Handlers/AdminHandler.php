<?php

namespace App\Handlers;

use App\Handlers\AbstractHandler;

use App\Core\Article\RecipeArticle;
use App\Core\Tools\FileParser;
use Parsedown;

class AdminHandler extends AbstractHandler
{

	public function getArticleList()
	{
		$fileParser = new FileParser('recipes\\markdown\\');

		$recipeFiles = $fileParser->getFileNames();

		$content = '';

		foreach ($recipeFiles as $fileName) {
			$content .= '<a href="' . DOMAIN . 'admin/recipes/markdown/' . $fileName . '" >' . $fileName . '</a> <br />';
		}

		return $content;
	}

	public function getMarkdown($path)
	{
		$fileParser = new FileParser();

		return $fileParser->getFileContents($path);
	}

	public function getArticleByPath()
	{
		$recipe = new RecipeArticle;

		return $recipe;
	}

}