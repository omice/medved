<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 18.04.13
 * Time: 16:07
 */

abstract class Model_Abstract_SimpleTree extends ProphetORM_Model implements ArrayAccess {

	public		$level;
	public		$childNodes	= array();
	protected	$_parent_key;
	private		$_container	= array();


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

	public function getParentAttrName(){

		return $this->_parent_key;
	}

	public function getPKValue(){

		return $this->_primary_key_value;
	}

	public function getPKAttrName(){

		return $this->_primary_key;
	}

	public function getChildList(){

		return ;
	}

	public function getChildNode(){

		return $this->_container->nodes;
	}

	public function getParent(){

		return ;
	}

	public function getParentNode(){

		return ;
	}


	/**
	 * ArrayAccess impliment
	 */
	public function offsetSet($offset, $value) {

		if (is_null($offset)) {

			$this->_container[] = $value;
		} else {
			$this->_container[$offset] = $value;
		}
	}
	public function offsetExists($offset) {

		return isset($this->_container[$offset]);
	}
	public function offsetUnset($offset) {

		unset($this->_container[$offset]);
	}
	public function offsetGet($offset) {

		return isset($this->_container[$offset]) ? $this->_container[$offset] : null;
	}
}