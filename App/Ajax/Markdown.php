<?php 

namespace App\Ajax;

use App\Ajax\AbstractAjax;

use App\Core\Traits\GetServiceTrait;

use Parsedown;
use App\Core\Tools\FileParser;

class Markdown extends AbstractAjax
{
	use GetServiceTrait;

	public function processAjax($route)
	{
		$request    = $this->get('core.request'); 

		if($request->getRequestParam('action') == null) {
			throw new \Exception('No action passed to markdown ajax controller');
		}

		switch($request->getRequestParam('action')) {
			case 'preview':
				$this->previewMarkdown();
				break;
			case 'save':
				$this->saveMarkdown();
				break;
		}

		exit;
	}

	private function previewMarkdown()
	{
		$parsedown  = new Parsedown();
		$request    = $this->get('core.request'); 

		echo $parsedown->text($request->getRequestParam('content'));
	}

	private function saveMarkdown()
	{
		$request    = $this->get('core.request');
		$fileParser = new FileParser();

		$content      = $request->getRequestParam('content');	
		$markdownPath = $request->getRequestParam('markdownPath');

		$fileParser->writeData($markdownPath, $content);

		echo 'Successfully saved ' . $markdownPath;
	}

}