<?php

namespace phelper;

class SchemaTree implements ArrayAccess{

	private $_container	= array();


	public function getImportsRules(){

	}

	public function getImportRule($index, $part){

	}

	public function clearImportRules(){

	}

	public function deleteImportRule(){

	}

	public function addImportRule(){

	}

	public function loadFromArray($arrayOfTmpl){

	}

	public function pushTmpl($tmp){

	}


	public function clearTmpl(){

	}


	public function getTmplFileName($index, $part){

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