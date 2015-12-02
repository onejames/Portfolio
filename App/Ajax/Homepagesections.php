<?php 

namespace App\Ajax;

use App\Ajax\AbstractAjax;
use App\Core\Interfaces\ToJson;
use App\Core\Tools\FileParser;

class Homepagesections extends AbstractAjax implements ToJson
{

	public function toJson()
	{

		$fileParser = new FileParser('projects');
		$sections = $fileParser->parseFile('homepage/homepagesections.json', 'json');

		foreach ($sections as $key => $value) {
			$sections[$key]->image = IMG_PATH . 'sections/' . $value->image;
		}

		foreach ($sections as $key => $value) {
			$sections[$key]->link = DOMAIN . $value->link;
		}

		return json_encode($sections);
	}

}
