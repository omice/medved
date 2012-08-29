<?php defined('SYSPATH') or die('No direct script access.'); ?>

2012-08-17 20:59:44 --- ERROR: ErrorException [ 1 ]: Call to undefined method Controller_Front::ghj() ~ APPPATH/classes/controller/front.php [ 22 ]
2012-08-17 20:59:44 --- STRACE: ErrorException [ 1 ]: Call to undefined method Controller_Front::ghj() ~ APPPATH/classes/controller/front.php [ 22 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-08-17 20:59:44 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-08-17 20:59:44 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /home/s/sochi4x4ru/mdev.sochi4x4.ru/public_html/index.php(110): Kohana_Request->execute()
#1 {main}