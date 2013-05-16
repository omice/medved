<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Shop extends Controller_Base_Shop {

	public function action_index()
	{
		$this->View->render();
	}


	public function action_list()
	{
		$this->View->render();


	}


	public function action_getCategoryList(){

		$categoryId	= $this->request->param('id');

		$Category   	= new Model_Category();
		$CategoryTag	= $Category->getChilds((int) $categoryId);
		var_dump($CategoryTag);




		$this->View->render();

	}
}

