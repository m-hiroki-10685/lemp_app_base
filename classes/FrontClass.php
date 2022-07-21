<?php

namespace Classes;

use Classes\ModelClass;

class FrontClass extends ModelClass
{

	public $_css_path = '/temp/css/';
	public $_js_path = '/temp/js/';

	public function __construct()
	{
		parent::__construct();
		$this->_route_name = basename($_SERVER['PHP_SELF'], '.php');
		$this->setStyleSheet($this->_route_name);
		$this->setJavascript($this->_route_name);

	}


	public function setStyleSheet($name)
	{
		$css = [];
		$css[] = $this->_css_path . 'app.css';

		switch ($name) {

			case 'index':
				$css[] = $this->_css_path . 'index.css';
				break;

			// case 'detail':
			// 	$css[] = $this->_css_path . 'detail.css';
			// 	break;

			default:
				break;
		}

		$this->_css = $css;
		return $this->_css;
	}

	public function getStyleSheet()
	{
		return $this->_css;
	}

	public function setJavascript($name)
	{
		$js = [];
		//$js[] = 'https://cdn.jsdelivr.net/npm/lazysizes@5.2.2/lazysizes-umd.min.js';

		switch ($name) {

			case 'index':
				$js[] = $this->_js_path . 'index.js';
				break;

			default:
				break;
		}

		$this->_js = $js;
		return $this->_js;
	}

	public function getJavascript()
	{
		return $this->_js;
	}

	public function getAssets()
	{
		foreach ($this->getStyleSheet() as $val) {
			if($_ENV['APP_DEBUG']){
				echo '<link rel="stylesheet" href="' . $val . '?date=' . date('YmdHis') . '" async>';
			}else{
				echo '<link rel="stylesheet" href="' . $val. '" async>';
			}
		}
		foreach ($this->getJavascript() as $val) {
			if($_ENV['APP_DEBUG']){
				echo '<script defer src="' . $val . '?date=' . date('YmdHis') . '" ></script>';
			}else{
				echo '<script defer src="'.$val.'"></script>';
			}
		}
	}
}