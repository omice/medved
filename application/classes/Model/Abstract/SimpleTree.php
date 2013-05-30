<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 18.04.13
 * Time: 16:07
 */

abstract class Model_Abstract_SimpleTree extends ProphetORM_Model implements Interface_TreeModel{

	public		$level;
	public		$childNodes	= array();
	protected 	$_table_name;
	protected 	$_primary_key;
	protected	$_parent_key;

	public function __construct($id){

		parent::__construct();

		if(!$this->_parent_key){

			Kohana::auto_load('Model_Exeption_SimpleTree');
			throw new Model_Exeption_SimpleTree('"_parent_key" must be specified');
		}

		array_push($this->_export_map, 'level');

		$this->_primary_key_value	= $id;
		$this->_container			= $this->where($this->_primary_key, '=', $this->_primary_key_value)->find()->as_array();
	}



	 /* Implement Interface_TreeModel */

	public function getExportMap(){

		return $this->_export_map;
	}

	public function getParentKeyName(){

		return $this->_parent_key;
	}

	public function getParentKeyValue(){

		return $this->{$this->_parent_key};
	}

	public function getPKName(){

		return $this->_primary_key;
	}

	public function getPKValue(){

		return $this->_primary_key_value;
	}

	public function getTableName(){

		return $this->_table_name;
	} /* end of: Implement Interface_TreeModel */
}