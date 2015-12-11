<?php

namespace App\Controllers;

use App\Router\Route;
use App\Core\Template\Template;
use App\Core\Interfaces\IsService;
use App\Core\Traits\GetServiceTrait;
use App\Core\Traits\ServiceTrait;


abstract class AbstractController implements IsService
{

	use ServiceTrait;

	use GetServiceTrait;

	protected $route;

	protected $template;

	protected $pageValues = [];

	protected $javascript = [];

	protected $css        = [];

	protected $handler;

	public function controll(Route $route)
	{
		$this->route = $route;

		if( $this->route->getPage() == null ) {

			$this->processIndex();

		} else {
		
			$this->processRoute();

		}
		
		$this->render();
	}
	
	public function processRoute()
	{	
		throw new \Exception("This controller does not impliment routes");
	}	

	public function processInxex()
	{	
		throw new \Exception("This controller does not impliment an index");
	}

	public function render()
	{
		$this->css[]        = 'main';
		$this->javascript[] = 'main';

		if($this->template == null) {
			throw new \Exception("Cant render a page with out a template");
		}

		$templateFile = TEMPLATE_PATH . $this->template . '.php';
		
		$pageTemplate = new Template($templateFile);

		$pageTemplate->setValues($this->pageValues);

		$pageOutput = $pageTemplate->render();

		$template = new Template(TEMPLATE_PATH . 'index.php');

		$indexValues = array(
				'subtemplateBody' => $pageOutput,
				'javascript'      => $this->javascript,
				'css'             => $this->css,
				'title'           => (isset($this->pageValues['title']) ? $this->pageValues['title'] : 'James Laster'),
			);

		$template->setValues($indexValues);

		$output = $template->render();
		
		echo $output;
	}

	public function setTemplate($value)
	{
		$this->template = $value;
	}


	public function setPageValues($value)
	{
		$this->pageValues = $value;
	}

	public function setJavascript($value)
	{
		$this->javascript = $value;
	}

	public function addJavascript($value)
	{
		$this->javascript[] = $value;
	}

	public function setCss($value)
	{
		$this->css = $value;
	}

	public function addCss($value)
	{
		$this->css[] = $value;
	}

	public function setHandler($value)
	{
	    $this->handler = $value;
	    
	    return $this;
	}

	public function getHandler()
	{
		if($this->handler == null) {
			throw new \Exception('Cant get a handler before setting class');
		}

		return new $this->handler;
	}
}