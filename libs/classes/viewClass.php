<?php

class View
{
	private $viewPath;
	private $vars = [];
	
	
	public function __construct($viewPath, $vars = [])
	{
		$this->viewPath = $viewPath;
		$this->vars = $vars;
	}
	
	public function renderView()
	{
		ob_start($this->loadView());
		ob_clean();
	}
	
	public function loadView()
	{
		extract($this->vars);
		include($this->viewPath);
	}
	
	
}


?>