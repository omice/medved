<?php
/**
 * Created by JetBrains PhpStorm.
 * User: omni
 * Date: 12.04.13
 * Time: 1:12
 * To change this template use File | Settings | File Templates.
 */

class Model_Category extends ProphetORM_Model {

	protected $_table_name  = 'categories';
	protected $_primary_key = 'category_id';

	public function getList(){

		return $this->find_all();
	}
}