<?php 

namespace App\Ajax;

use App\Ajax\AbstractAjax;

use App\Core\Traits\GetServiceTrait;

use App\Core\Tools\FileParser;

class Json extends AbstractAjax
{
	use GetServiceTrait;

	public function processAjax($route)
	{
		$request    = $this->get('core.request'); 

		if($request->getRequestParam('action') == null) {
			throw new \Exception('No action passed to json ajax controller');
		}

		switch($request->getRequestParam('action')) {
			case 'save':
				$this->saveJson();
				break;
		}

		exit;
	}

	private function saveJson()
	{
		$request    = $this->get('core.request');
		$fileParser = new FileParser();

		$content  = $this->translatePostToJson($request->getRequestParam('content'));
		$jsonPath = $request->getRequestParam('jsonPath');

		$fileParser->writeData($jsonPath, $content);

		echo 'Successfully saved ' . $jsonPath;
	}

	private function translatePostToJson($data)
	{
		$json = array();

		foreach ($data as $value) {

			$json[$value['name']] = $value['value'];
		}

		return json_encode((object) $json);
	}

}