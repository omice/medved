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
	protected $_export_map	= array(
		'category_id',
		'category_parent',
		'category_name',
		'category_desc',
	);

}