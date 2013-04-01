<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index extends Controller {

	public function action_index()
	{
		echo 'index action';
		var_dump(Prophetdb::instance());
	}

	public function action_lists()
	{
		//$auth = ProphetDB::instance();
		//var_dump($auth);
//		$this->View->render(array(
//			'text'	=> 'Front/lists',
//		));

//		debug_print_backtrace();
		//$this->ghj();
	}

}