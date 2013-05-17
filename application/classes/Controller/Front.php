<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Front extends Controller_Base_Front {

	public function action_index()
	{
		$this->View->render();
	}


	public function action_contact(){

		$this->View->render();
	}


	public function action_about(){

		$this->View->render();
	}

	public function action_service(){

		$this->View->render();
	}


	public function action_lists()
	{
		$this->View->render();


	}


	public function action_getCategoryList(){

		$categoryId	= $this->request->param('id');

		$Category   	= new Model_Category($categoryId);
		$CategoryTag	= $Category->getChildTree();

		var_dump($CategoryTag);

	}

	public function action_menu(){

		$this->View->showChild('elements/menu/vmenu');
	}



	public function action_getPageList(){

		$pageList = array(
			array(
				'name'	=> 'about',
				'url'	=> '/about',
				'title'	=> 'О компании',
				'html'	=> ''
			),
			array(
				'name'	=> 'service',
				'url'	=> '/service',
				'title'	=> 'Сервис',
				'html'	=> ''
			),
			array(
				'name'	=> 'contact',
				'url'	=> '/contact',
				'title'	=> 'Контактная информация',
				'html'	=> ''
			),
		);

//		$jsonPages	= array();
//		foreach($pageList as $Page){
//			$jsonPages	= json_encode($)
//
//		}

		echo json_encode($pageList);

	}

	public function action_getContentModel(){

		$pageList = array(
			array(
				'index'	=> 'about',
				'name'	=> 'about',
				'url'	=> '/about',
				'title'	=> 'О компании',
				'html'	=> ''
			),
			array(
				'index'	=> 'service',
				'name'	=> 'service',
				'url'	=> '/service',
				'title'	=> 'Сервис',
				'html'	=> ''
			),
			array(
				'index'	=> 'contact',
				'name'	=> 'contact',
				'url'	=> '/contact',
				'title'	=> 'Контактная информация',
				'html'	=> ''
			),
		);

//		$jsonPages	= array();
//		foreach($pageList as $Page){
//			$jsonPages	= json_encode($)
//
//		}

		echo json_encode($pageList);

	}

}

