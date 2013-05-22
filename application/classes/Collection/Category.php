<?php

class Collection_Category extends Collection_Abstract_SimpleTree {

	private static		$_instance		= false;
	protected static	$_model_name	= 'Model_Category';


	public function __construct(){

		parent::__construct(self::$_model_name);

		return $this;
	}

	private static function __init(){

		if (!self::$_instance){

			self::$_instance	= new self();
		}
	}


	public static function getInstance(){

		self::__init();

		return self::$_instance;
	}


	public static function __callStatic($methodName, $arguments){

		self::__init();

		$methodNewName	= 'pub_'.$methodName;
		if (method_exists(__CLASS__, $methodNewName)){

			var_dump(__CLASS__ . '::' .$methodNewName);
			return call_user_func_array(__CLASS__ . '::' .$methodNewName  , $arguments);

		}
	}



	protected static function pub_getExportMap(){

		return self::$_instance->getExportMap();
	}

	protected static function pub_getParentKeyName(){

		return self::$_instance->getParentKeyName();
	}

	protected static function pub_getPKName(){

		return self::$_instance->getPKName();
	}

	protected static function pub_getNodeChildsById($id){

		return self::$_instance->getNodeChildsById($id);
	}

	protected static function pub_findNodeById($id){

		return self::$_instance->findNodeById($id);
	}


	public static function getLeafs(){

		self::__init();

		return DB::select('t1.*')->distinct(TRUE)
			->from(array(self::$_instance->_table_name, 't1'))
			->join(array(self::$_instance->_table_name, 't2'), 'LEFT')
			->on('t2.'.(self::$_instance->_parent_key), '=', 't1.'.(self::$_instance->_primary_key) )
			->where('t2.'.(self::$_instance->_primary_key), 'IS', NULL)
			->and_where('t1.'.(self::$_instance->_parent_key), 'IS NOT', NULL)
			->execute(
				Prophet::instance()
					->getConfigByTableName(
						self::$_instance->_table_name
					)
			);
	}

	public static function getBranches(){

		self::__init();

		return DB::select('t2.*')->distinct(TRUE)
			->from(array(self::$_instance->_table_name, 't1'))
			->join(array(self::$_instance->_table_name, 't2'), 'LEFT')
			->on('t2.'.(self::$_instance->_primary_key), '=', 't1.'.(self::$_instance->_parent_key) )
			->where('t2.'.(self::$_instance->_parent_key), 'IS NOT', NULL)
			->execute(
				Prophet::instance()
					->getConfigByTableName(
						self::$_instance->_table_name
					)
			);
	}


	public static function getModelName(){

		return self::$_model_name;
	}
}