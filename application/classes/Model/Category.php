<?php
/**
 * Created by JetBrains PhpStorm.
 * User: omni
 * Date: 12.04.13
 * Time: 1:12
 * To change this template use File | Settings | File Templates.
 */

Kohana::auto_load('Model_Abstract_SimpleTree');

class Model_Category extends Model_Abstract_SimpleTree {

	protected $_table_name  = 'categories';
	protected $_primary_key = 'category_id';
	protected $_parent_key	= 'category_parent';

	public function getList(){

		return $this->find_all();
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

		return $flatTree;
	}
}