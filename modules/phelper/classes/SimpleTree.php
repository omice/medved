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
	private $_rootIndex;

	public function __construct($args){

	}

	public function setSchema($schema){

		$this->_schema	= $schema;
	}


	public function makeTree($treeObject){

		static $rootIndex;
		static $treeStr;
		static $parentIdAttrName;

		$parentIdAttrName	= !$parentIdAttrName ? $treeObject->getParentAttrName() : $parentIdAttrName;

		foreach($treeObject as $node){

			if (!$this->_rootIndex && is_null($node->$parentIdAttrName)){

				$this->_rootIndex	= $node->level;
			}

			$treeStr	.= $this->renderNodeBegin($node);

			if (isset($node->nodes)){

				$this->makeTree($node->nodes);
			}

			$treeStr	.= $this->renderNodeEnd($node);

		}

		return $treeStr;
	}

	/*
	<div id="<?= $nodeId ?>"><?= $nodeContent ?>
		<span><?= $nodeDesc	?></span>
	</div>
	*/
	private function renderNodeBegin($node){

		return $this->renderNode($node, 'start');
	}


	private function renderNodeEnd($node){

		return $this->renderNode($node, 'end');
	}



	private function renderNode($node, $part){

		$nodeIndex	= $this->_rootIndex - $node->level;

		$tmplFileName	= $this->_schema->getTmplFileName($nodeIndex, $part);

		foreach($this->_schema->getImportRule($nodeIndex, $part) as $newVar => $newVal){

			$$newVar	= $newVal;
		}

		ob_start();
			include($tmplFileName);
			$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}
}