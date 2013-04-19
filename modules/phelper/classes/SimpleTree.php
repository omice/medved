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

	public function makeTree($treeObject, $options = NULL){

		$options	= array(
			1	=> array('[', ']'),
			2	=> array('--[', ']'),
			3	=> array('----[', ']'),
		);

		foreach($treeObject as $node){


		}

	}
}