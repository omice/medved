<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 18.04.13
 * Time: 16:07
 * To change this template use File | Settings | File Templates.
 */

abstract class Model_Abstract_SimpleTree extends ProphetORM_Model {

	protected $_parent_key;

	public function __construct(){

		parent::__construct();

		if(!$this->_parent_key){

			Kohana::auto_load('Model_Abstract_Exeption_SimpleTree');
			throw new Model_Abstract_Exeption_SimpleTree('"_parent_key" must be specified');
		}
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
}