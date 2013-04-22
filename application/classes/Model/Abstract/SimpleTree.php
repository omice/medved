<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 18.04.13
 * Time: 16:07
 * To change this template use File | Settings | File Templates.
 */

abstract class Model_Abstract_SimpleTree extends ProphetORM_Model implements ArrayAccess, Iterator {

	protected	$_parent_key;
	private		$_container	= array();

	public function __construct(){

		parent::__construct();

		if(!$this->_parent_key){

			Kohana::auto_load('Model_Abstract_Exeption_SimpleTree');
			throw new Model_Abstract_Exeption_SimpleTree('"_parent_key" must be specified');
		}
	}


	public function getParentAttrName(){

		return $this->_parent_key;
	}

	public function getRoots(){

		return $this->where('category_parent', '=', NULL)->find_all();
	}

	public function getLeafs(){

		return DB::select('t1.*')->distinct(TRUE)
			->from(array($this->_table_name, 't1'))
			->join(array($this->_table_name, 't2'), 'LEFT')
			->on('t2.'.($this->_parent_key), '=', 't1.'.($this->_primary_key) )
			->where('t2.'.($this->_primary_key), 'IS', NULL)
			->and_where('t1.'.($this->_parent_key), 'IS NOT', NULL)
			->execute($this->_db_group);
	}

	public function getBranches(){

		return DB::select('t2.*')->distinct(TRUE)
			->from(array($this->_table_name, 't1'))
			->join(array($this->_table_name, 't2'), 'LEFT')
			->on('t2.'.($this->_primary_key), '=', 't1.'.($this->_parent_key) )
			->where('t2.'.($this->_parent_key), 'IS NOT', NULL)
			->execute($this->_db_group);
	}


	public function makeTree(&$node = NULL){

		static $flatTree;

		$PKName		= $this->_primary_key;
		$PrKName	= $this->_parent_key;

		if (!$flatTree){

			$flatTree	= $this->find_all()->as_collection_of_objects($this->_primary_key);
		}

		if ($node){

			if (!isset($node->level)){

				$node->level	= 1;
			}

			foreach($flatTree as $childId => $child){

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

				$flatTree[$node->$PrKName]->level	= $node->level -1;
			}

		}else{

			foreach($flatTree as &$node){

				$this->makeTree($node);
			}

			// remove non-root elements from root
			foreach($flatTree as &$node){

				if ($node->$PrKName){

					unset($flatTree[$node->$PKName]);
				}
			}
		}

		$this->_container	= $flatTree;
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