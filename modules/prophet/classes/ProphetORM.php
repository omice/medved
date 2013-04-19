<?php
/**
 * Created by JetBrains PhpStorm.
 * User: omni
 * Date: 26.08.12
 * Time: 3:02
 * To change this template use File | Settings | File Templates.
 */
abstract class ProphetORM extends ORM {

	protected $_table_name;
	protected $_db;


	public function __construct(){

		if (!$this->_table_name){
			throw new Database_Exception('Table names not set in model');
		}

		$this->_db   		= Prophet::instance()->getFromPool($this->_table_name);
		$this->_db_group	= Prophet::instance()->getConfigByTableName($this->_table_name);

		parent::__construct();
	}

	public static function factory($model, $id = NULL){

		$modelName = 'Model_'.$model;
		if (!class_exists($modelName)){
			Kohana::auto_load($modelName);
		}
		return parent::factory($model, $id);
	}
}
