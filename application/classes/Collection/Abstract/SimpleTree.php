<?php
/**
 * @abstract
 * для статического экспорта методы должны иметь префикс
 *
 * @TODO сделать индексированый поиск узлов
 * @TODO переделать интерфейс ArrayAccess
 */

abstract class Collection_Abstract_SimpleTree implements ArrayAccess, Iterator, Interface_TreeCollection {

	protected 	$_table_name;
	protected	$_primary_key;
	protected	$_parent_key;
	protected 	$_model_name;
	protected	$_export_map; // карта экспорта полей, которые будут доступны при построении дерева (может быть задан в виде обычного или хэш массива)
	private		$_container		= array();


	/**
	 * @param $modelName
	 * @throws Collection_Exeption_SimpleTree
	 */
	protected function __construct($modelName){

		$modInfo			= new ReflectionClass($modelName);

		if (!interface_exists('Interface_TreeModel') || !$modInfo->implementsInterface('Interface_TreeModel')){

			Kohana::auto_load('Collection_Exeption_SimpleTree');
			throw new Collection_Exeption_SimpleTree('Model interface not supported (must be instance of "Model_Abstract_SimpleTree" class)');
		}

		$modProps				= $modInfo->getDefaultProperties();
		$this->_table_name		= $modProps['_table_name'];
		$this->_primary_key		= $modProps['_primary_key'];
		$this->_parent_key		= $modProps['_parent_key'];
		$this->_export_map		= $modProps['_export_map'];
		$this->_model_name		= $modelName;


		$modelList	= Prophet::instance()
			->getFromPool($this->_table_name)
			->query(
				Database::SELECT,
				"SELECT * FROM {$this->_table_name}"
		)->as_collection_of_objects($this->_primary_key);

		while(list($modelId, ) = each($modelList)){

			$this->_container[$modelId]	= new Model_Category($modelId);
		}

		$this->makeTree();
	}


	public function getExportMap(){

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

	public function getModelName(){

		return $this->_model_name;
	}

	public function getChildNodesById($id){

		$node = $this->_findNodeById($id);

		if ($node){

			return $node->childNodes;
		}

		return false;
	}

	public function getNodeById($id){

		return $this->_findNodeById($id);
	}


	private function _findNodeById($id, $nodes = NULL){

		if (is_null($nodes)){

			$nodes = $this->_container;
		}

		if (!empty($nodes)){

			foreach($nodes as $nodeID => $node){

				if ($nodeID == $id){

					return $node;

				}elseif(isset($node->childNodes)){

					$result	= $this->_findNodeById($id, $node->childNodes);
					if ($result){
						return $result;
					}
				}
			}
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


	/**
	 * ArrayAccess implement
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
	 * Iterator implement
	 */
	public function rewind() {

		reset($this->_container);
	}

	public function current() {

		return current($this->_container);
	}

	public function key() {

		return key($this->_container);
	}

	public function next() {

		next($this->_container);
	}

	public function valid() {

		return (bool) current($this->_container);
	}
}