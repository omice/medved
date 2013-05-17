<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 18.04.13
 * Time: 16:07
 */

abstract class Model_Abstract_SimpleTree extends ProphetORM_Model implements ArrayAccess, Iterator {

	protected	$_parent_key;
	protected	$_export_map; // карта экспорта полей, которые будут доступны при построении дерева (может быть задан в виде обычного или хэш массива)
	private		$_container	= array();
	private		$_node;


	public function __construct($id = NULL){

		parent::__construct();

		if(!$this->_parent_key){

			Kohana::auto_load('Model_Exeption_SimpleTree');
			throw new Model_Exeption_SimpleTree('"_parent_key" must be specified');
		}

		if(!$this->_export_map){

			Kohana::auto_load('Model_Exeption_SimpleTree');
			throw new Model_Exeption_SimpleTree('"_exportMap" must be specified');
		}

		if (!is_null($id)){

			$this->_node				= $this->find_all()->as_collection_of_objects($this->_primary_key);
			$this->_primary_key_value	= $id;
			$this->makeTree();
		}
	}

	public function getExportMap(){

		return $this->_export_map;
	}

	public function getParentAttrName(){

		return $this->_parent_key;
	}

	public function getPK(){

		return $this->_primary_key_value;
	}

	public function getPKAttrName(){

		return $this->_primary_key;
	}

	public function getChildList(){

		return $this->where($this->_parent_key, '=', $this->_primary_key_value)->find_all();
	}

	public function getChildTree(){

		return $this->_node->nodes;
	}

	public function makeTree(&$node = NULL){

		$PKName		= $this->_primary_key;
		$PrKName	= $this->_parent_key;

		if ($node){

			if (!isset($node->level)){

				$node->level	= 1;
			}

			foreach($this->_node as $childId => $child){

				if ($child->$PrKName == $node->$PKName){

					if (!isset($child->level)){

						$child->level	= $node->level + 1;

					}elseif (!isset($node->level)){

						$node->level	= $child->level - 1;
					}

					$node->nodes[$childId]	= $child;
				}
			}

			if (!is_null($node->$PrKName)){

				$this->_node[$node->$PrKName]->level	= $node->level -1;
			}

		}else{

			foreach($this->_node as &$node){

				$this->makeTree($node);
			}

			// remove non-root elements from root
			foreach($this->_node as &$node){

				if ($node->$PrKName){

					unset($this->_node[$node->$PKName]);
				}
			}
		}

		$this->_container	= $this->_node;
//		$this->_container	= $this->_node[$this->_primary_key_value];
		return $this;
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


	/**
	 * Iterator impliment
	 */
	function rewind() {

		reset($this->_container);
	}

	function current() {

		return current($this->_container);
	}

	function key() {

		return key($this->_container);
	}

	function next() {

		next($this->_container);
	}

	function valid() {

		return (bool) current($this->_container);
	}
}