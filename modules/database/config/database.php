<?php defined('SYSPATH') or die('No direct access allowed.');

return array
(
	'default' => array
	(
		'type'       => 'mysql',
		'connection' => array(
			/**
			 * The following options are available for MySQL:
			 *
			 * string   hostname     server hostname, or socket
			 * string   database     database name
			 * string   username     database username
			 * string   password     database password
			 * boolean  persistent   use persistent connections?
			 * array    variables    system variables as "key => value" pairs
			 *
			 * Ports and sockets may be appended to the hostname.
			 */
			'hostname'   => 'localhost',
			'database'   => 'sochi4x4ru',
			'username'   => 'sochi4x4ru',
			'password'   => '123321',
			'persistent' => true,
		),
		'table_prefix' => '',
		'charset'      => 'utf8',
		'caching'      => FALSE,
		'profiling'    => TRUE,
	),
	'mypdo'     => array(
		'type'       => 'pdo',
		'connection' => array(
			/**
			 * The following options are available for PDO:
			 *
			 * string   dsn         Data Source Name
			 * string   username    database username
			 * string   password    database password
			 * boolean  persistent  use persistent connections?
			 */
			'dsn'        => 'mysql:host=localhost;dbname=sochi4x4ru',
			'username'   => 'sochi4x4ru',
			'password'   => '123321',
			'persistent' => true,
		),
		/**
		 * The following extra options are available for PDO:
		 *
		 * string   identifier  set the escaping identifier
		 */
		'table_prefix' => '',
		'charset'      => 'utf8',
		'caching'      => FALSE,
		'profiling'    => TRUE,
	),

	'pgkohana' => array
	(
		'type'       => 'postgresql',
		'connection' => array(
			/**
			 * There are two ways to define a connection for PostgreSQL:
			 *
			 * 1. Full connection string passed directly to pg_connect()
			 *
			 * string   info
			 *
			 * 2. Connection parameters:
			 *
			 * string   hostname    NULL to use default domain socket
			 * integer  port        NULL to use the default port
			 * string   username
			 * string   password
			 * string   database
			 * boolean  persistent
			 * mixed    ssl         TRUE to require, FALSE to disable, or 'prefer' to negotiate
			 *
			 * @link http://www.postgresql.org/docs/current/static/libpq-connect.html
			 */
			'hostname'   => 'pg.sweb.ru',
			'username'   => 'sochi4x4ru',
			'password'   => '123321',
			'persistent' => TRUE,
			'database'   => 'sochi4x4ru',
		),
		'primary_key'  => '',   // Column to return from INSERT queries, see #2188 and #2273
		'schema'       => 'kohana',
		'table_prefix' => '',
		'charset'      => 'utf8',
		'caching'      => FALSE,
		'profiling'    => TRUE,
	),
	'pgapp' => array
	(
		'type'       => 'postgresql',
		'connection' => array(
			'hostname'   => 'pg.sweb.ru',
			'username'   => 'sochi4x4ru',
			'password'   => '123321',
			'persistent' => TRUE,
			'database'   => 'sochi4x4ru',
		),
		'primary_key'  => '',   // Column to return from INSERT queries, see #2188 and #2273
		'schema'       => 'application',
		'table_prefix' => '',
		'charset'      => 'utf8',
		'caching'      => FALSE,
		'profiling'    => TRUE,
	),
	'pgshop' => array
	(
		'type'       => 'postgresql',
		'connection' => array(
			'hostname'   => 'pg.sweb.ru',
			'username'   => 'sochi4x4ru',
			'password'   => '123321',
			'persistent' => TRUE,
			'database'   => 'sochi4x4ru',
		),
		'primary_key'  => '',   // Column to return from INSERT queries, see #2188 and #2273
		'schema'       => 'shop',
		'table_prefix' => '',
		'charset'      => 'utf8',
		'caching'      => FALSE,
		'profiling'    => TRUE,
	),
);