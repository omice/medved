<?php defined('SYSPATH') or die('No direct script access.');

class Prophet {

	static private $_instance;
	private $_pool              = array();
	private $_config;
	private $_mapingConfig;
	private $_balanceConfig;
	private $_aConnectionMap    = array();

	private function __construct(){

		/**
		 * load configs
		 */
		$this->_config  = require MODPATH . 'prophet/config/prophet'. EXT;

		if ($this->_config['table_mapping']){
			$this->_mapingConfig    = require MODPATH . 'prophet/config/maping'. EXT;

			foreach($this->_mapingConfig as $sConnectionName => $aTableMap){
				$this->_aConnectionMap    = array_merge(array_fill_keys($aTableMap, $sConnectionName), $this->_aConnectionMap);
			}
		}

		if ($this->_config['auto_balance']){
			$this->_balanceConfig   = require MODPATH . 'prophet/config/balance'. EXT;
		}

		$this->makeConnectionPool();

	}

	static public function instance(){

		if (!self::$_instance){

			self::$_instance    = new self;
		}

		return self::$_instance;
	}

	private function makeConnectionPool()
	{
		if ($this->_mapingConfig){
			foreach(array_keys($this->_mapingConfig) as $sConnectionName){

				$this->_pool[$sConnectionName]  = Database::instance($sConnectionName);

			}
		}else{
			$this->_pool['default'] = Database::instance($this->_config['connection_name']);
		}
	}


	public function getFromPool($sTableName = null){

		if ($sTableName && $this->_config['table_mapping']){

			if (isset($this->_aConnectionMap[$sTableName])){
				return $this->_pool[$this->_aConnectionMap[$sTableName]];

			}else{
				return $this->getFromPool();
			}
		}else{
			if (!isset($this->_pool['default'])){
				// if mapping used, but record not exists for current table
				$this->_pool['default'] = Database::instance($this->_config['connection_name']);
			}
			return $this->_pool['default'];
		}
	}


	public function getConfigByTableName($sTableName = null){

		if ($sTableName && $this->_config['table_mapping']){

			if (isset($this->_aConnectionMap[$sTableName])){
				return $this->_aConnectionMap[$sTableName];
			}
		}
		return NULL;
	}
}