<?php defined('SYSPATH') or die('No direct script access.'); ?>

2012-08-11 01:28:57 --- ERROR: ReflectionException [ 0 ]: Class Controller_Front does not have a constructor, so you cannot pass any constructor arguments ~ SYSPATH/classes/kohana/request/client/internal.php [ 101 ]
2012-08-11 01:28:57 --- STRACE: ReflectionException [ 0 ]: Class Controller_Front does not have a constructor, so you cannot pass any constructor arguments ~ SYSPATH/classes/kohana/request/client/internal.php [ 101 ]
--
#0 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request/client/internal.php(101): ReflectionClass->newInstance(Object(Request), Object(Response))
#1 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#2 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#3 /home/s/sochi4x4ru/mdev.sochi4x4.ru/public_html/index.php(110): Kohana_Request->execute()
#4 {main}
2012-08-11 01:32:23 --- ERROR: ReflectionException [ 0 ]: Class Controller_Front does not have a constructor, so you cannot pass any constructor arguments ~ SYSPATH/classes/kohana/request/client/internal.php [ 101 ]
2012-08-11 01:32:23 --- STRACE: ReflectionException [ 0 ]: Class Controller_Front does not have a constructor, so you cannot pass any constructor arguments ~ SYSPATH/classes/kohana/request/client/internal.php [ 101 ]
--
#0 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request/client/internal.php(101): ReflectionClass->newInstance(Object(Request), Object(Response))
#1 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#2 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#3 /home/s/sochi4x4ru/mdev.sochi4x4.ru/public_html/index.php(110): Kohana_Request->execute()
#4 {main}
2012-08-11 01:39:10 --- ERROR: ReflectionException [ 0 ]: Method before does not exist ~ SYSPATH/classes/kohana/request/client/internal.php [ 103 ]
2012-08-11 01:39:10 --- STRACE: ReflectionException [ 0 ]: Method before does not exist ~ SYSPATH/classes/kohana/request/client/internal.php [ 103 ]
--
#0 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request/client/internal.php(103): ReflectionClass->getMethod('before')
#1 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#2 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#3 /home/s/sochi4x4ru/mdev.sochi4x4.ru/public_html/index.php(110): Kohana_Request->execute()
#4 {main}
2012-08-11 01:46:10 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-08-11 01:46:10 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /home/s/sochi4x4ru/mdev.sochi4x4.ru/public_html/index.php(110): Kohana_Request->execute()
#1 {main}
2012-08-11 01:55:17 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL front/clientList was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 113 ]
2012-08-11 01:55:17 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL front/clientList was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 113 ]
--
#0 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 /home/s/sochi4x4ru/mdev.sochi4x4.ru/public_html/index.php(110): Kohana_Request->execute()
#3 {main}
2012-08-11 21:58:12 --- ERROR: ErrorException [ 1 ]: Call to a member function get() on a non-object ~ APPPATH/classes/controller/base.php [ 14 ]
2012-08-11 21:58:12 --- STRACE: ErrorException [ 1 ]: Call to a member function get() on a non-object ~ APPPATH/classes/controller/base.php [ 14 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-08-11 22:31:18 --- ERROR: ErrorException [ 1 ]: Call to a member function get() on a non-object ~ APPPATH/classes/controller/base.php [ 14 ]
2012-08-11 22:31:18 --- STRACE: ErrorException [ 1 ]: Call to a member function get() on a non-object ~ APPPATH/classes/controller/base.php [ 14 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-08-11 22:31:21 --- ERROR: ErrorException [ 1 ]: Call to a member function get() on a non-object ~ APPPATH/classes/controller/base.php [ 14 ]
2012-08-11 22:31:21 --- STRACE: ErrorException [ 1 ]: Call to a member function get() on a non-object ~ APPPATH/classes/controller/base.php [ 14 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-08-11 22:31:22 --- ERROR: ErrorException [ 1 ]: Call to a member function get() on a non-object ~ APPPATH/classes/controller/base.php [ 14 ]
2012-08-11 22:31:22 --- STRACE: ErrorException [ 1 ]: Call to a member function get() on a non-object ~ APPPATH/classes/controller/base.php [ 14 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-08-11 22:51:14 --- ERROR: ErrorException [ 1 ]: Call to a member function get() on a non-object ~ APPPATH/classes/controller/base.php [ 14 ]
2012-08-11 22:51:14 --- STRACE: ErrorException [ 1 ]: Call to a member function get() on a non-object ~ APPPATH/classes/controller/base.php [ 14 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-08-11 23:29:26 --- ERROR: ErrorException [ 1 ]: Call to undefined method Kohana_Config::get() ~ APPPATH/classes/controller/base.php [ 13 ]
2012-08-11 23:29:26 --- STRACE: ErrorException [ 1 ]: Call to undefined method Kohana_Config::get() ~ APPPATH/classes/controller/base.php [ 13 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}