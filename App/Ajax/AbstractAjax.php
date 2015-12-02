<?php 

namespace App\Ajax;

use App\Core\Traits\GetServiceTrait;

abstract class AbstractAjax
{

	use GetServiceTrait;

	abstract public function toJson();

}