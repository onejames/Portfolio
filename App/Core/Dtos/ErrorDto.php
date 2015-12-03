<?php

namespace App\Core\Dtos;

use App\Core\Dtos\AbstractDto;

class ErrorDto extends AbstractDto
{
	public $isError = true;
	
	public $type;
	
	public $title;
	
	public $status;
	
	public $detail;

}