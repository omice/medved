<?php defined('SYSPATH') or die('No direct script access.');

include_once MODPATH.'prophet/classes/ProphetDB'.EXT;
include_once MODPATH.'prophet/classes/ProphetORM'.EXT;

abstract class ProphetDB_Model extends ProphetDB {}

abstract class ProphetORM_Model extends ProphetORM {}