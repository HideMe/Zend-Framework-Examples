<?php

class LS_Reflection_Module
{

	private $name;

	private $controllers = array();

	public function __construct($name, $directory)
	{
		$this->name = $name;

		$files = new LS_File_FilterIterator($directory, '@Controller\.php$@i');
		foreach($files as $file) {
			$controller = new LS_Reflection_Controller($file->getPathname());
			$this->controllers[$controller->getControllerName()] = $controller;
		}
	}

	public function getName()
	{
		return $this->name;
	}

	public function getControllers()
	{
		return $this->controllers;
	}

}
