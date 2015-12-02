<?php 

namespace App\Ajax;

use App\Ajax\AbstractAjax;
use App\Core\Tools\FileParser;
use App\Core\Interfaces\ToJson;

class Projects extends AbstractAjax implements ToJson
{

	public function toJson()
	{

		$fileParser = new FileParser('projects/json');
		$projects = $fileParser->parseFiles('json');

		foreach ($projects as $key => $value) {
			$projects[$key]->image = IMG_PATH . 'projects/' . $value->image;
		}

		foreach ($projects as $key => $value) {
			$projects[$key]->link = DOMAIN . 'projects/' . $value->link;
		}

		return json_encode($projects);
	}

}