<?php

namespace App\Core\Tools;

use App\Core\Interfaces\IsService;
use App\Core\Traits\ServiceTrait;
use App\Core\Traits\GetServiceTrait;

class Hydrator implements IsService
{
	use ServiceTrait;
	
	use GetServiceTrait;

	private $objectPrototype;
	
	public function hydrate($data, $object = null)
	{

		if( !is_object($object) && !is_object($this->objectPrototype) ) {
			throw new Exception("Must have an object to hydrate");
		} else if (!is_object($object)) {
			$object = clone $this->objectPrototype;
		}

		foreach ($data as $key => $value) {
			if( method_exists( $object, 'set' . ucfirst($key) ) ) {
				$method = 'set' . ucfirst($key);
				$object->$method($value);
			}
		}

		return $object;
	}

	public function setPrototype($prototype)
	{
		$this->objectPrototype = $prototype;
	}

}