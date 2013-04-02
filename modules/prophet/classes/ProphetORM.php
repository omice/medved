<?php
/**
 * Created by JetBrains PhpStorm.
 * User: omni
 * Date: 26.08.12
 * Time: 3:02
 * To change this template use File | Settings | File Templates.
 */
abstract class ProphetORM extends ORM {

	protected $_table_name;
	protected $_db;

	public function __construct(){

		if (!$this->_table_name){
			throw new Database_Exception('Table names not set in model');
		}

		$this->_db   = Prophet::instance()->getFromPool($this->_table_name);

		parent::__construct();
	}


	public function as_list_of_arrays(Database_Result $sqlResult, $inidexBy = null){

		return $this->feachSqlResult($sqlResult, 'array', $inidexBy);
	}

	public function as_list_of_objects(Database_Result $sqlResult, $inidexBy = null){

		return $this->feachSqlResult($sqlResult, 'object', $inidexBy);
	}

	private function feachSqlResult(Database_Result $sqlResult, $feachBy = 'array', $inidexBy = null){

		$objects = array();

		foreach($sqlResult as $result){

			$object = $result->as_array();
			if ($inidexBy){
				$objects[$object[$inidexBy]]	= ($feachBy == 'array' ? $object : (object) $object);
			}else{
				$objects[]	= ($feachBy == 'array' ? $object : (object) $object);
			}
		}

		return $objects;
	}


}
