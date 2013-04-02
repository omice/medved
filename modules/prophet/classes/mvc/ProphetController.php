<?php defined('SYSPATH') or die('No direct script access.');

class ProphetController extends Controller {

	protected $View;
	protected $Config;
	protected $viewAutoload = null;

	public function __construct(Request $request, Response $response, $Config = null){

		parent::__construct($request, $response);

		if ($Config){
			$this->Config   = $Config;

		}else{
			$this->Config   = Kohana::$config->load('application.default');
		}

		if (is_null($this->viewAutoload)){
			$this->viewAutoload = $this->Config['viewAutoload'];
		}

		if ($this->viewAutoload){
			$this->loadView();
		}
	}

	
	protected function loadView($Config = null){
		
		$controllerName	= $this->request->controller();
		$viewObj 		= 'View_'.ucfirst($controllerName);

		if (!$Config){
			$Config = $this->Config;
		}

		if (Kohana::find_file('classes/View', $controllerName)){
			if (class_exists($viewObj)){

				$this->View = new $viewObj($this->request, $this->response, $Config);
			}
		}
	}
}