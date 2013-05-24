<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Base_Shop extends Controller_Base {

	public function __construct(Request $request, Response $response){

		parent::__construct($request, $response);

		$mainMenuRenderSchema	= Phelper::Factory('SchemaTree', APPPATH . 'views/elements/menu/treeSchema.php' );

		$SimpleTreeView	= Phelper::Factory('SimpleTree', Collection_Category::getInstance(), $mainMenuRenderSchema);

		$this->View->setLayout('list');

//		var_dump($SimpleTreeView->renderToString());
//
//		$this->View->setLayoutData(array(
//			'category_menu' => $SimpleTreeView->renderToString(),
//		));
	}

}