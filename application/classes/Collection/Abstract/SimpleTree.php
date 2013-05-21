<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 18.04.13
 * Time: 16:07
 * @see Prorhet
 */

class Collection_Abstract_SimpleTree implements ArrayAccess, Iterator {

	protected 	$_table_name;
	protected	$_parent_key;
	protected	$_export_map; // карта экспорта полей, которые будут доступны при построении дерева (может быть задан в виде обычного или хэш массива)
	protected 	$_DB;
	private		$_container	= array();


	public function __construct(){

		if(!$this->_parent_key){

			throw new Collection_Abstract_Exeption_SimpleTree('"_parent_key" must be specified');
		}

		if(!$this->_export_map){

			throw new Collection_Abstract_Exeption_SimpleTree('"_exportMap" must be specified');
		}

		$this->_DB			= Prophet::instance()->getFromPool($this->_table_name);

		$treeListSQL	= $this->_DB->query(
			Database::SELECT,
			"SELECT * FROM {$this->_table_name}"
		);

		$modelList	= $treeListSQL->as_collection_of_objects($this->_primary_key);
		while(list($modelId, ) = each($modelList)){

			$this->_container[$modelId]	= new Model_Category($modelId);
		}

		$this->makeTree();
	}


	public function getExportMap(){

		return $this->_export_map;
	}

	public function getParentAttrName(){

		return $this->_parent_key;
	}

	public function getPKAttrName(){

		return $this->_primary_key;
	}

	public function getRoots(){

		return $this->where($this->_parent_key, 'IS', NULL)->find_all();
	}

	public function getNodeChildsById($id){

		$node = $this->findNodeById($id);

		if ($node){

			return $node->childNodes;
		}

		return false;
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


	public function makeTree($node = NULL){

		$PKName		= $this->_primary_key;
		$PrKName	= $this->_parent_key;

		if (empty($this->_container)){

			// do something...
		}

		if ($node){

			if (!isset($node->level)){

				$node->level	= 1;
			}

			foreach($this->_container as $childId => $child){

				if ($child->$PrKName == $node->$PKName){

					if (!isset($child->level)){

						$child->level	= $node->level + 1;

					}elseif (!isset($node->level)){

						$node->level	= $child->level - 1;
					}

					$node->childNodes[$childId]	= $child;

				}
			}

			if (!is_null($node->$PrKName)){

				$this->_container[$node->$PrKName]->level	= $node->level -1;
			}

		}else{

			foreach($this->_container as $node){

				$this->makeTree($node);
			}

			// remove non-root elements from root
			foreach($this->_container as $node){

				if ($node->$PrKName){

					unset($this->_container[$node->$PKName]);
				}
			}
		}

		return $this;
	}


	public function findNodeById($id, $nodes = NULL){

		if (is_null($nodes)){

			$nodes = $this->_container;
		}

		if (!empty($nodes)){

			foreach($nodes as $nodeID => $node){

				if ($nodeID == $id){

					return $node;

				}elseif(isset($node->childNodes)){

					$result	= $this->findNodeById($id, $node->childNodes);
					if ($result){
						return $result;
					}
				}
			}
		}

		return false;
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