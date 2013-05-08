<?php

namespace phelper;

/**
 * Class SchemaTree
 * @package phelper
 * Весьма абстрактный класс реализующий объектную обертку вокруг массива а так же возможность загрузки массива из файла
 * @TODO SimpleTreeAccess
 */
class SchemaTree implements \ArrayAccess{ // SimpleTreeAccess

	private $_container	= array();
	const tmpContainer	= 'tmpl';


	/**
	 * @param array|string $schema
	 * @throws \Kohana_Exception
	 */
	public function __construct($schema = null){

		switch (gettype($schema)){
			case 'array':
				$this->loadFromArray($schema);
				break;
			case 'string':
				$this->loadFromFile($schema);
				break;
			default:
				throw new \Kohana_Exception('Unknown schema type');
				break;
		}
	}


	/**
	 * @param $arrayOfTmpl
	 */
	private function loadFromArray($arrayOfTmpl){

		$this->_container	= $arrayOfTmpl;
	}

	/**
	 * @param $filePath
	 */
	private function loadFromFile($filePath){

		$this->_container	= include $filePath;
	}


	protected function __validate(){}

	/**
	 * @param $index
	 * @param null $tag
	 * @return mixed
	 */
	public function getByIndex($index, $tag = null){

		return $tag ? $this->_container[$index][self::tmpContainer][$tag] : $this->_container[$index][self::tmpContainer];
	}

	public function setImportList($map){

	}


	# ArrayAccess implements
	/**
	 * @param mixed $offset
	 * @param mixed $value
	 */
	public function offsetSet($offset, $value) {

		if (is_null($offset)) {

			$this->_container[] = $value;
		} else {
			$this->_container[$offset] = $value;
		}
	}

	/**
	 * @param mixed $offset
	 * @return bool
	 */
	public function offsetExists($offset) {

		return isset($this->_container[$offset]);
	}

	/**
	 * @param mixed $offset
	 */
	public function offsetUnset($offset) {

		unset($this->_container[$offset]);
	}

	/**
	 * @param mixed $offset
	 * @return mixed|null
	 */
	public function offsetGet($offset) {

		return isset($this->_container[$offset]) ? $this->_container[$offset] : null;
	}

	# end of: ArrayAccess implements

}