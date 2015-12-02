<?php

namespace App\Core\Template;

class template
{
	
    protected $file;

    protected $values = array();
  
    public function __construct($file = null)
    {
        $this->file = $file;
    }

    public function setFile($file)
    {
        $this->file = $file;
    }

	public function set($key, $value)
	{
	    $this->values[$key] = $value;
	}

	public function setValues($array = [])
	{
	    $this->values = $array;
	}
	  
	public function render()
	{
		$this->output = null;

	    if (!file_exists($this->file)) {
	        return "Error loading template file ($this->file).";
	    }

	    $output = $this->getProcessedContents($this->file);
	  
	    foreach ($this->values as $key => $value) {
	    	if($key == 'javascript') {
	    		$value = $this->compileJavascript($value);
	    	}

	    	if($key == 'css') {
	    		$value = $this->compileCss($value);
	    	}

	        $tagToReplace = "[@$key]";
	        $output = str_replace($tagToReplace, $value, $output);
	    }
	  
	    $this->output = $output;

	    return $output;
	}

	private function compileJavascript($jsArray)
	{
		$return = '';

		foreach ($jsArray as $val) {
			$return .= '<script src="' . JAVASCRIPT_PATH . $val . '.js"></script>';
		}

		return $return;
	}

	private function compileCss($cssArray)
	{
		$return = '';

		foreach ($cssArray as $val) {
			$return .= '<link rel="stylesheet" type="text/css" href="' . CSS_PATH . $val . '.css">';
		}

		return $return;
	}

	private function getProcessedContents($file)
	{
	    ob_clean();
	    
	    include($file);
	    
	    $output = ob_get_contents();
	    
	    ob_clean();

	    return $output;
	}

}