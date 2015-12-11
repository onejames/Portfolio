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
				'content' => $this->getHandler()->getArticleList(),
			)
		);

	}
	
	public function processRoute()
	{
		$parsedown  = new Parsedown();

		$this->setTemplate('admin/markdownTemplate');

		$this->setJavascript(
			array(
			)
		);

		$this->setCss(
			array(
				'admin'
			)
		);

		$article  = $this->route->getPage() . '/' . implode('/', $this->route->getSlugs());
		$makrdown = $this->getHandler()->getMarkdown($article);

		$this->setPageValues(
			array(
				'title'           => 'Admin',
				'rawMarkdown'     => $makrdown,
				'markdownPreview' => $parsedown->text($makrdown),
				'articleTitle'    => $article,
			)
		);

	}

}