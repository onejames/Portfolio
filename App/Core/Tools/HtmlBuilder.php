<?php

namespace App\Core\Tools;

class HtmlBuilder
{

	public function makeInputTable($object) 
	{
		// var_dump($object);die();
		if(!is_array($object)) {
			$object = (object) $object;
		}

		if(!is_object($object)) {
			throw new Exception("Error Processing Request", 1);
		}

		$output = '<table class="inputTable">';

		foreach ($object as $key => $value) {
			$output .= '<tr>';
			
			$output .= '<td>';
			$output .= ucfirst($key) . ': ';
			$output .= '</ td>';
			
			$output .= '<td>';
				$output .= '<input type="text" name="' . $key . '" id="' . $key . '" value="' . $object->$key . '" />';
			$output .= '</ td>';

			$output .= '</ tr>';
		}

		return $output .= '</table>';
	}

}