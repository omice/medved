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

		$Category   	= new Model_Category($categoryId);
//
//		$CategoryTag	= $Category->getChildList();
//		var_dump($CategoryTag);

		$col	= new Collection_Category();
		//var_dump($col);
//		var_dump($col->findNodeById($categoryId)->level);
		var_dump($col->getNodeChildsById($Category->getPKValue()));

die();
//		$this->View->render();

	}
}

