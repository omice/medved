<?php


Kohana::auto_load('Collection_Abstract_SimpleTree');

class Collection_Category extends Collection_Abstract_SimpleTree {

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