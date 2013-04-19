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
		$Category   = new Model_Category();
//		$listRoots	= $Category->getRoots();
//		$listLeafs	= $Category->getLeafs();
//		$listBranches	= $Category->getBranches();

//		var_dump($listLeafs->as_collection_of_objects());
//		var_dump($listBranches->as_collection_of_objects());
//		var_dump($listRoots->as_collection_of_objects());

		var_dump($Category->makeTree());
//		$SimpleTreeView	= Phelper::Factory('SimpleTree');
//		$SimpleTreeView->makeTree();

//		$this->View->render();
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

