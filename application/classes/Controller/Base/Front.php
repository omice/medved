<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Base_Front extends Controller_Base {

	public function __construct(Request $request, Response $response){

		parent::__construct($request, $response);

		$Category   = new Model_Category();

		$mainMenuRenderSchema	= Phelper::Factory('SchemaTree', APPPATH . 'views/elements/menu/treeSchema.php' );

		$SimpleTreeView	= Phelper::Factory('SimpleTree', $Category->makeTree(), $mainMenuRenderSchema);

		$this->View->setLayoutData(array(
			'category_menu' => $SimpleTreeView->renderToString(),
		));
	}

}