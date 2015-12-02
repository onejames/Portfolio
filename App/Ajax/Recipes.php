<?php 

namespace App\Ajax;

use App\Ajax\AbstractAjax;
use App\Core\Interfaces\ToJson;
use App\Core\Tools\FileParser;

class Recipes extends AbstractAjax implements ToJson
{

	public function toJson()
	{

		$fileParser = new FileParser('recipes/json');
		$sections = $fileParser->parseFiles('json');

		foreach ($sections as $key => $value) {
			$sections[$key]->image = IMG_PATH . 'recipes/' . $value->image;
		}

		foreach ($sections as $key => $value) {
			$sections[$key]->link = DOMAIN . 'recipes/' . $value->link;
		}

		return json_encode($sections);
	}

}
