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
 * header (meta tags and other)
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

		$this->View->render();
	}





	public function action_lists()
	{
		echo 'index action---';
//		var_dump(Prophet::instance());
		$user   = new Model_User();
//		$app    = new Model_Test();
		var_dump($user);

		$this->View->showChild('front/pages/main', array(
			'text'	=> 'some text1',
		));
//		$this->mklsd();
		//$auth = ProphetDB::instance();
		//var_dump($auth);
//		$this->View->render(array(
//			'text'	=> 'front/lists',
//		));

//		debug_print_backtrace();
		//$this->ghj();
	}




}

