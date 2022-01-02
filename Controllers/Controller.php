<?php
namespace Controllers;

abstract class Controller 
{
	protected $pageTitle;

	abstract protected function getViewPath(); 
	protected function render($template, $data = []) 
	{
		ob_start();
		extract($data);
		// ./ это папка проекта www
		// echo realpath('./') . PHP_EOL;
		include './Views/' . $this->getViewPath() . $template . '.php';
		$content = ob_get_clean();
		
		ob_start();
		$pageTitle = $this->pageTitle;
		include './Views/layout.php';
		return ob_get_clean();
	}
}
