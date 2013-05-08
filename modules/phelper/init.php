<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 19.04.13
 * Time: 12:19
 * Lazzy load посредствам factory
 */

class Phelper{

	const NSPACE	= 'phelper\\';

	protected static $_configs_dir;
	protected static $_helpers_dir;


	private static function _configure(){

		if (!self::$_configs_dir || !self::$_helpers_dir){
			self::$_configs_dir	= MODPATH . 'phelper/config/';
			self::$_helpers_dir	= MODPATH . 'phelper/classes/';
		}

	}


	public static function Factory($HelperName){

		self::_configure();

		if (!class_exists(self::NSPACE . $HelperName)){
			require_once self::$_helpers_dir . $HelperName . EXT;
		}

		$HelperName	= self::NSPACE . $HelperName;

		// (new ReflectionClass($HelperName))->newInstanceArgs($args);

		$Reflect = new ReflectionClass($HelperName);

		$args	= func_get_args();
		array_shift($args);

		return $Reflect->newInstanceArgs($args);
	}

}