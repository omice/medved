<?php defined('SYSPATH') or die('No direct script access.');
/**
 * БЛОКИ
 *
 * блок поиска
 * блок подкаталога на странице контента
 * блок списка товара в категории
 * блок меню
 * корзина
 * правая колонка в блоке контента
 * левый блок рекламы
 * страница результатов поиска
 * 2 блока "другие статьи"
 * блок статьи на главной
 */

/**
 * АСПЕКТЫ
 *
 * поиск
 * товары
 * главное меню
 * правое меню
 * корзина
 * правая колонка в блоке контента
 * левый блок рекламы
 * статьи
 */


class Controller_Front extends Controller_Base_Front {

	public function action_index()
	{
		$this->View->render();

	}


	public function action_contact(){

		$this->View->render();
	}


	public function action_about(){

		echo json_encode(array(
			'html'	=> $this->View->get('Front/about')
		));
//		$this->View->render();
	}

	public function action_service(){

		$this->request->controller('error');
		$this->request->action('404');
		//$this->View->render();
	}


	public function action_lists()
	{
		$Category   = new Model_Category();
		$Category->getTree();
//		$parents = $Category->getChilds();
//		var_dump($parents->count());
//
//		foreach( $parents as $parent){
//			var_dump($parent->category_name);
//		}
//
//
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

