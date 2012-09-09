<?php defined('SYSPATH') or die('No direct script access.');
return array(
	'default'   => array(
					    'layout'        => 'default',
					    'viewAutoload'  => true,
						'view'          => array(
												'doctype'       => 'html',
												'title'         => 'Медведь - аксессуары и оборудование для внедорожников',
												'content'       => 'text/html',
												'charset'       => 'UTF-8',
												'meta'          => array(
																		'title'                             => 'Медведь - аксессуары и оборудование для внедорожников',
																		'keywords'                          => 'kohana keywords',
																		'description'                       => 'kohana description',
												),
												'script'       => array(
																		'/static/js/jquery-1.7.1.min.js'    => 'text/javascript',
																		'/static/js/jquery.cookie.js'       => 'text/javascript',
																		'/static/js/underscore-min.js'      => 'text/javascript',
																		'/static/js/backbone-min.js'        => 'text/javascript',
																		'/static/js/user.js'                => 'text/javascript',
												),
												'css'           => array(
																		'/static/css/style.css'             =>'stylesheet',
												),
						),
	),
);