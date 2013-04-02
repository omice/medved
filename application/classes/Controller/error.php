<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Error extends Controller_Base {

	public function action_404(){

		$this->request->status = 404;
		$this->View->render();
	}

}