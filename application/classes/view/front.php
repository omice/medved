<?php defined('SYSPATH') or die('No direct script access.');

class View_Front extends ProphetView {

	protected function lists(){

		$this->setHeader(array(
			'title' => 'my tittle',
		));
	}

}