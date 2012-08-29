<?php defined('SYSPATH') or die('No direct script access.');

class ProphetView {

	protected   $View;
	protected   $ViewData;
	protected   $Config;
	private     $layout;
	private     $Request;
	private     $Response;

	final public function __construct(Request $Request, Response $Response, $Config = null){

		if (!$Config){
			$Config = Kohana::$config->load('application.default');
		}

		$this->Config   = $Config;
		$this->Request  = $Request;
		$this->Response = $Response;
		$this->layout   = $this->Config['layout'];
		$this->View     = new stdClass();

	}


	final public function __call($method, $args){

		var_dump($method, $args);
	}

	final public function render($aData = array()){

		/**
		 * if method not exist or return false or null, then make default view
		 */
		$sMethodName    = $this->Request->action();
		if (!method_exists($this, $sMethodName) || !$this->$sMethodName($aData)){

			$sViewFile	= $this->Request->controller() . DIRECTORY_SEPARATOR . $this->Request->action();
			$this->ViewData	= $aData;
			$this->showChild($sViewFile, $aData);
		}
	}

	
	protected function makeHeader(){

		if (!isset($this->View->Header) || !$this->View->Header){
			$this->View->Header = $this->Config['view'];
		}
	}

	protected function makeBody(){

	}

	protected function compileView(){

	}


	/* PUBLIC section */
	public function setLayout($layout){

		$this->layout   = $layout;
	}

	public function show($sViewFile, $aData){

		$this->Response->body(View::factory($sViewFile, $aData));
	}

	public function get($sViewFile, $aData){

		return View::factory($sViewFile, $aData)->render();
	}

	public function showChild($sViewFile, $aData = null, $sLayout = null){

		if (!$sLayout){
			$sLayout    = $this->layout;
		}

		$view = View::factory('layouts' . DIRECTORY_SEPARATOR . $sLayout);
		$view->View = $this->View;


		$view->childView    = View::factory($sViewFile, $aData);

		/**
		 * uncomment if you want use syntax like  $Child->childViewVariable
		 * $view->childView    = View::factory($sViewFile, $aData);
		 * $view->childView->Child = (object) $aData;
		 */

		$this->makeHeader();
		$this->makeBody();
		$this->compileView();

		$this->Response->body($view);
	}


	public function addScript($source, $type){

		$this->Config['view']['script'][$source]    = $type;
	}

	public function addStyle($source, $type){

		$this->Config['view']['css'][$source]       = $type;
	}

	public function setHeader($aHeader){

		$this->Config['view']   = array_merge($this->Config['view'], $aHeader);
	}
}