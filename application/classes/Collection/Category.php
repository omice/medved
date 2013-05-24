<?php
/**
 * Class Collection_Category
 * @property getExportMap
 *
 */
class Collection_Category extends Collection_Abstract_SimpleTree implements Interface_StaticCollection {

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

	public static function staticExport($methodName, $arguments = NULL){

		$instance			= self::getInstance();
		$parentClassName	= get_parent_class($instance);
		$methodName			= $instance->getExportPrefix() . $methodName;

		if (!method_exists($parentClassName, $methodName)){

			Kohana::auto_load('Collection_Exeption_Category');
			throw new Collection_Exeption_Category('Method not exist or not support static export');
		}

		return call_user_func_array(array($instance, $methodName) , (array) $arguments);
	}


	public static function getInstance(){

		self::__init();

		return self::$_instance;
	}

	public static function getModelName(){

		return self::$_model_name;
	}


	public static function getExportMap(){

		return self::staticExport(__FUNCTION__);
	}

	public static function getParentKeyName(){

		return self::staticExport(__FUNCTION__);
	}

	public static function getPKName(){

		return self::staticExport(__FUNCTION__);
	}

	public static function getTableName(){

		return self::staticExport(__FUNCTION__);
	}

	public static function findNodeById($id){

		return self::staticExport(__FUNCTION__, $id);
	}

	public static function getLeafs(){

		$instance	= self::getInstance();

		return DB::select('t1.*')->distinct(TRUE)
			->from(array($instance->_table_name, 't1'))
			->join(array($instance->_table_name, 't2'), 'LEFT')
			->on('t2.'.($instance->_parent_key), '=', 't1.'.($instance->_primary_key) )
			->where('t2.'.($instance->_primary_key), 'IS', NULL)
			->and_where('t1.'.($instance->_parent_key), 'IS NOT', NULL)
			->execute(
				Prophet::instance()
					->getConfigByTableName(
						$instance->_table_name
					)
			);
	}

	public static function getBranches(){

		$instance	= self::getInstance();

		return DB::select('t2.*')->distinct(TRUE)
			->from(array($instance->_table_name, 't1'))
			->join(array($instance->_table_name, 't2'), 'LEFT')
			->on('t2.'.($instance->_primary_key), '=', 't1.'.($instance->_parent_key) )
			->where('t2.'.($instance->_parent_key), 'IS NOT', NULL)
			->execute(
				Prophet::instance()
					->getConfigByTableName(
						$instance->_table_name
					)
			);
	}

}