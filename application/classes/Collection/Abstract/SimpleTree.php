<?php
/**
 * @abstract Must be inherited for creating instance
 *
 * @TODO сделать индексированый поиск узлов
 */

class Collection_Abstract_SimpleTree implements ArrayAccess, Iterator {

	protected 	$_table_name;
	protected	$_primary_key;
	protected	$_parent_key;
	protected	$_export_map; // карта экспорта полей, которые будут доступны при построении дерева (может быть задан в виде обычного или хэш массива)
	private 	$_DB;
	private		$_container	= array();
	private		$_child_map	= array();


	/**
	 * @param $modelName
	 * @throws Collection_Exeption_SimpleTree
	 */
	protected function __construct($modelName){

		$modInfo			= new ReflectionClass($modelName);

		if (!class_exists('Model_Abstract_SimpleTree') || !$modInfo->isSubclassOf('Model_Abstract_SimpleTree')){

			Kohana::auto_load('Collection_Exeption_SimpleTree');
			throw new Collection_Exeption_SimpleTree('Model interface not supported (must be instance of "Model_Abstract_SimpleTree" class)');
		}

		$modProps			= $modInfo->getDefaultProperties();
		$this->_table_name	= $modProps['_table_name'];
		$this->_primary_key	= $modProps['_primary_key'];
		$this->_parent_key	= $modProps['_parent_key'];
		$this->_export_map	= $modProps['_export_map'];



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


	public function __call($methodName, $arguments){

		$methodNewName	= 'col_'.$methodName;
		if (method_exists(__CLASS__, $methodNewName)){

			return call_user_func_array(array($this, $methodNewName) , $arguments);

		}
	}


	public function col_getExportMap(){

		return $this->_export_map;
	}

	public function getParentKeyName(){

		return $this->_parent_key;
	}

	public function getPKName(){

		return $this->_primary_key;
	}

	public function getTableName(){

		return $this->_table_name;
	}

	public function getNodeChildsById($id){

		$node = $this->findNodeById($id);

		if ($node){

			return $node->childNodes;
		}

		return false;
	}


	private function makeTree($node = NULL){

		$PKName		= $this->_primary_key;
		$PrKName	= $this->_parent_key;

		if (empty($this->_container)){

			// do something...
		}

		if ($node){

			if (!isset($node->level)){

				$node->level	= 1;
			}

			$this->_child_map[$node->$PKName]	= array();

			foreach($this->_container as $childId => $child){

				if ($child->$PrKName == $node->$PKName){

					if (!isset($child->level)){

						$child->level	= $node->level + 1;

					}elseif (!isset($node->level)){

						$node->level	= $child->level - 1;
					}

					$node->childNodes[$childId]	= $child;

					array_push($this->_child_map[$node->$PKName], $childId);
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