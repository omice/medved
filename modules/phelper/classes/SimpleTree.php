<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 19.04.13
 * Time: 12:44
 * To change this template use File | Settings | File Templates.
 */

namespace phelper;

class SimpleTree {

	private $_schema;
	private $_tree;
	private $_rootIndex;

	public function __construct(\Collection_Abstract_SimpleTree $treeObject, SchemaTree $treeSchema){

		$this->_tree	= $treeObject;
		$this->_schema	= $treeSchema;

		$this->makeTree($this->_tree);

	}

	public function renderToString(){

		return $this->makeTree($this->_tree);
	}

	public function renderToOut(){

		echo $this->makeTree($this->_tree);
	}


	private function makeTree($treeObject){

		static $treeStr;
		static $parentIdAttrName;

		var_dump($treeObject);

		$parentIdAttrName	= !$parentIdAttrName ? $treeObject->getParentAttrName() : $parentIdAttrName;

		foreach($treeObject as $node){

			if (!$this->_rootIndex && is_null($node->$parentIdAttrName)){

				$this->_rootIndex	= $node->level;
			}

			$treeStr	.= $this->renderNodeBegin($node);

			if (isset($node->childNodes)){

				$this->makeTree($node->childNodes);
			}

			$treeStr	.= $this->renderNodeEnd($node);

		}

		return $treeStr;
	}

	private function renderNodeBegin($node){

		return $this->renderNode($node, 'start');
	}


	private function renderNodeEnd($node){

		return $this->renderNode($node, 'end');
	}



	private function renderNode($node, $part){

		$nodeIndex	= $node->level - $this->_rootIndex;

		$template	= $this->_schema->getByIndex($nodeIndex, $part);

		foreach($this->_tree->getExportMap() as $newVar => $newVal){

			if (is_int($newVar)){// если список не ассоциативные то экспортируем переменные под текущими именами
				$newVar = $newVal;
			}
			$$newVar	= $node->$newVal;
		}

		ob_start();
			eval('?>' . $template);
			$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}
}