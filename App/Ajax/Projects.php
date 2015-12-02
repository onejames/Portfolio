<?php 

namespace App\Ajax;

use App\Ajax\AbstractAjax;
use App\Core\Interfaces\ToJson;

class Projects extends AbstractAjax implements ToJson
{

	public function toJson()
	{

		$projectsHandler = $this->get('app.project.handler');
		$projects        = $projectsHandler->getProjectDetailsList();

		return json_encode($projects);
	}

}