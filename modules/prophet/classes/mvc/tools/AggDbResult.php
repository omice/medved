<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 17.04.13
 * Time: 11:42
 * To change this template use File | Settings | File Templates.
 */

abstract class AggDbResult {

	public function as_collection_of_arrays(Database_Result $sqlResult, $inidexBy = NULL){

		return $this->feachSqlResult($sqlResult, 'array', $inidexBy);
	}

	public function as_collection_of_objects(Database_Result $sqlResult, $inidexBy = NULL){

		return $this->feachSqlResult($sqlResult, 'object', $inidexBy);
	}

	protected function feachSqlResult(Database_Result $sqlResult, $feachBy = 'array', $inidexBy = NULL){

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