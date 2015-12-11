<?php

namespace App\Controllers;

use App\Controllers\AbstractController;

use Parsedown;

class AdminController extends AbstractController
{

	public function __construct()
	{
		$this->setHandler('App\Handlers\AdminHandler');
	}

	public function processIndex()
	{
		$this->setTemplate('admin/admin');

		$this->setJavascript(
			array(
			)
		);

		$this->setCss(
			array(
				'admin'
			)
		);

		$this->setPageValues(
			array(
				'title'   => 'Admin',
				'recipeList' => $this->getHandler()->getRecipeList(),
				'projectList' => $this->getHandler()->getProjectList(),
			)
		);

	}
	
	public function processRoute()
	{
		$parsedown  = new Parsedown();

		$this->setTemplate('admin/markdownTemplate');

		$this->setJavascript(
			array(
				'admin',
			)
		);

		$this->setCss(
			array(
				'admin',
			)
		);

		$articleName = array_pop($this->route->getSlugs());
		$articleName = str_replace('.markdown', '', $articleName);
		$articleName = str_replace('_', ' ', $articleName);

		$markdownPath  = $this->route->getPage() . '/' . implode('/', $this->route->getSlugs());
		$makrdown      = $this->getHandler()->getMarkdown($markdownPath);
		$properties    = $this->getHandler()->getProperties(str_replace('markdown', 'json', $markdownPath));

		$this->setPageValues(
			array(
				'title'           => 'Admin',
				'rawMarkdown'     => $makrdown,
				'markdownPreview' => $parsedown->text($makrdown),
				'articleTitle'    => $articleName,
				'markdownPath'	  => $markdownPath,
				'inputTable|jsonProperties'  => $properties,
			)
		);

	}

}