<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 19.04.13
 * Time: 12:19
 * Lazzy load посредствам factory
 */

class Phelper{

	protected static $_configs_dir;
	protected static $_helpers_dir;


	private static function _configure(){

		if (!self::$_configs_dir || !self::$_helpers_dir){
			self::$_configs_dir	= MODPATH . 'phelper/config/';
			self::$_helpers_dir	= MODPATH . 'phelper/classes/';
		}

	}


	public static function Factory($HelperName, $args = NULL){

		self::_configure();

		if (!class_exists($HelperName)){

			require_once self::$_helpers_dir . $HelperName . EXT;
		}

		$HelperName	= 'phelper\\'.$HelperName;
		return new $HelperName($args);
	}

}