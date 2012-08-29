<?php defined('SYSPATH') or die('No direct script access.'); ?>

2012-08-14 01:53:45 --- ERROR: ErrorException [ 8 ]: Undefined property:  View_Front::$request ~ APPPATH/classes/view/base.php [ 98 ]
2012-08-14 01:53:45 --- STRACE: ErrorException [ 8 ]: Undefined property:  View_Front::$request ~ APPPATH/classes/view/base.php [ 98 ]
--
#0 /home/s/sochi4x4ru/mdev.sochi4x4.ru/application/classes/view/base.php(98): Kohana_Core::error_handler(Array)
#1 /home/s/sochi4x4ru/mdev.sochi4x4.ru/application/classes/controller/front.php(21): View_base->render()
#2 [internal function]: Controller_Front->action_lists(Object(Controller_Front))
#3 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Request))
#4 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute()
#6 /home/s/sochi4x4ru/mdev.sochi4x4.ru/public_html/index.php(110): Kohana_Request->execute()
#7 {main}
2012-08-14 01:54:40 --- ERROR: View_Exception [ 0 ]: The requested view front/lists could not be found ~ SYSPATH/classes/kohana/view.php [ 252 ]
2012-08-14 01:54:40 --- STRACE: View_Exception [ 0 ]: The requested view front/lists could not be found ~ SYSPATH/classes/kohana/view.php [ 252 ]
--
#0 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/view.php(137): Kohana_View->set_filename('front/lists')
#1 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/view.php(30): Kohana_View->__construct('front/lists', Array)
#2 /home/s/sochi4x4ru/mdev.sochi4x4.ru/application/classes/view/base.php(74): Kohana_View::factory('front/lists', Array)
#3 /home/s/sochi4x4ru/mdev.sochi4x4.ru/application/classes/view/base.php(99): View_base->showChild('front/lists', Array)
#4 /home/s/sochi4x4ru/mdev.sochi4x4.ru/application/classes/controller/front.php(21): View_base->render(Array)
#5 [internal function]: Controller_Front->action_lists()
#6 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Front))
#7 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 /home/s/sochi4x4ru/mdev.sochi4x4.ru/public_html/index.php(110): Kohana_Request->execute()
#10 {main}
2012-08-14 01:56:07 --- ERROR: View_Exception [ 0 ]: The requested view front/lists could not be found ~ SYSPATH/classes/kohana/view.php [ 252 ]
2012-08-14 01:56:07 --- STRACE: View_Exception [ 0 ]: The requested view front/lists could not be found ~ SYSPATH/classes/kohana/view.php [ 252 ]
--
#0 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/view.php(137): Kohana_View->set_filename('front/lists')
#1 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/view.php(30): Kohana_View->__construct('front/lists', Array)
#2 /home/s/sochi4x4ru/mdev.sochi4x4.ru/application/classes/view/base.php(74): Kohana_View::factory('front/lists', Array)
#3 /home/s/sochi4x4ru/mdev.sochi4x4.ru/application/classes/view/base.php(99): View_base->showChild('front/lists', Array)
#4 /home/s/sochi4x4ru/mdev.sochi4x4.ru/application/classes/controller/front.php(21): View_base->render(Array)
#5 [internal function]: Controller_Front->action_lists()
#6 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Front))
#7 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 /home/s/sochi4x4ru/mdev.sochi4x4.ru/public_html/index.php(110): Kohana_Request->execute()
#10 {main}
2012-08-14 04:09:20 --- ERROR: ErrorException [ 8 ]: Undefined variable: aData ~ APPPATH/classes/view/front.php [ 15 ]
2012-08-14 04:09:20 --- STRACE: ErrorException [ 8 ]: Undefined variable: aData ~ APPPATH/classes/view/front.php [ 15 ]
--
#0 /home/s/sochi4x4ru/mdev.sochi4x4.ru/application/classes/view/front.php(15): Kohana_Core::error_handler(Array)
#1 /home/s/sochi4x4ru/mdev.sochi4x4.ru/application/classes/view/base.php(38): View_Front->lists(Array)
#2 /home/s/sochi4x4ru/mdev.sochi4x4.ru/application/classes/controller/front.php(21): View_Base->render()
#3 [internal function]: Controller_Front->action_lists(Object(Controller_Front))
#4 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Request))
#5 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute()
#7 /home/s/sochi4x4ru/mdev.sochi4x4.ru/public_html/index.php(110): Kohana_Request->execute()
#8 {main}
2012-08-14 04:10:08 --- ERROR: ErrorException [ 8 ]: Undefined variable: aData ~ APPPATH/classes/view/front.php [ 15 ]
2012-08-14 04:10:08 --- STRACE: ErrorException [ 8 ]: Undefined variable: aData ~ APPPATH/classes/view/front.php [ 15 ]
--
#0 /home/s/sochi4x4ru/mdev.sochi4x4.ru/application/classes/view/front.php(15): Kohana_Core::error_handler(Array)
#1 /home/s/sochi4x4ru/mdev.sochi4x4.ru/application/classes/view/base.php(38): View_Front->lists(Array)
#2 /home/s/sochi4x4ru/mdev.sochi4x4.ru/application/classes/controller/front.php(21): View_Base->render()
#3 [internal function]: Controller_Front->action_lists(Object(Controller_Front))
#4 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Request))
#5 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute()
#7 /home/s/sochi4x4ru/mdev.sochi4x4.ru/public_html/index.php(110): Kohana_Request->execute()
#8 {main}
2012-08-14 04:19:37 --- ERROR: View_Exception [ 0 ]: The requested view fron/pages/main could not be found ~ SYSPATH/classes/kohana/view.php [ 252 ]
2012-08-14 04:19:37 --- STRACE: View_Exception [ 0 ]: The requested view fron/pages/main could not be found ~ SYSPATH/classes/kohana/view.php [ 252 ]
--
#0 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/view.php(137): Kohana_View->set_filename('fron/pages/main')
#1 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/view.php(30): Kohana_View->__construct('fron/pages/main', NULL)
#2 /home/s/sochi4x4ru/mdev.sochi4x4.ru/application/classes/view/base.php(89): Kohana_View::factory('fron/pages/main', NULL)
#3 /home/s/sochi4x4ru/mdev.sochi4x4.ru/application/classes/view/front.php(15): View_Base->showChild('fron/pages/main', NULL)
#4 /home/s/sochi4x4ru/mdev.sochi4x4.ru/application/classes/view/base.php(38): View_Front->lists(Array)
#5 /home/s/sochi4x4ru/mdev.sochi4x4.ru/application/classes/controller/front.php(21): View_Base->render(Array)
#6 [internal function]: Controller_Front->action_lists()
#7 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Front))
#8 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /home/s/sochi4x4ru/mdev.sochi4x4.ru/public_html/index.php(110): Kohana_Request->execute()
#11 {main}
2012-08-14 04:20:11 --- ERROR: View_Exception [ 0 ]: The requested view fron/pages/main could not be found ~ SYSPATH/classes/kohana/view.php [ 252 ]
2012-08-14 04:20:11 --- STRACE: View_Exception [ 0 ]: The requested view fron/pages/main could not be found ~ SYSPATH/classes/kohana/view.php [ 252 ]
--
#0 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/view.php(137): Kohana_View->set_filename('fron/pages/main')
#1 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/view.php(30): Kohana_View->__construct('fron/pages/main', NULL)
#2 /home/s/sochi4x4ru/mdev.sochi4x4.ru/application/classes/view/base.php(89): Kohana_View::factory('fron/pages/main', NULL)
#3 /home/s/sochi4x4ru/mdev.sochi4x4.ru/application/classes/view/front.php(15): View_Base->showChild('fron/pages/main', NULL)
#4 /home/s/sochi4x4ru/mdev.sochi4x4.ru/application/classes/view/base.php(38): View_Front->lists(Array)
#5 /home/s/sochi4x4ru/mdev.sochi4x4.ru/application/classes/controller/front.php(21): View_Base->render(Array)
#6 [internal function]: Controller_Front->action_lists()
#7 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Front))
#8 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /home/s/sochi4x4ru/mdev.sochi4x4.ru/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /home/s/sochi4x4ru/mdev.sochi4x4.ru/public_html/index.php(110): Kohana_Request->execute()
#11 {main}
2012-08-14 04:24:40 --- ERROR: ErrorException [ 1 ]: Class 'ProphetController' not found ~ APPPATH/classes/controller/front.php [ 3 ]
2012-08-14 04:24:40 --- STRACE: ErrorException [ 1 ]: Class 'ProphetController' not found ~ APPPATH/classes/controller/front.php [ 3 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler('controller_fron...')
#1 {main}
2012-08-14 04:42:03 --- ERROR: ErrorException [ 1 ]: Call to undefined method Controller_Front::ghj() ~ APPPATH/classes/controller/front.php [ 22 ]
2012-08-14 04:42:03 --- STRACE: ErrorException [ 1 ]: Call to undefined method Controller_Front::ghj() ~ APPPATH/classes/controller/front.php [ 22 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-08-14 04:43:13 --- ERROR: ErrorException [ 1 ]: Call to undefined method Controller_Front::ghj() ~ APPPATH/classes/controller/front.php [ 22 ]
2012-08-14 04:43:13 --- STRACE: ErrorException [ 1 ]: Call to undefined method Controller_Front::ghj() ~ APPPATH/classes/controller/front.php [ 22 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-08-14 04:44:09 --- ERROR: ErrorException [ 1 ]: Call to undefined method Controller_Front::ghj() ~ APPPATH/classes/controller/front.php [ 22 ]
2012-08-14 04:44:09 --- STRACE: ErrorException [ 1 ]: Call to undefined method Controller_Front::ghj() ~ APPPATH/classes/controller/front.php [ 22 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2012-08-14 04:47:24 --- ERROR: ErrorException [ 1 ]: Call to undefined method Controller_Front::ghj() ~ APPPATH/classes/controller/front.php [ 22 ]
2012-08-14 04:47:24 --- STRACE: ErrorException [ 1 ]: Call to undefined method Controller_Front::ghj() ~ APPPATH/classes/controller/front.php [ 22 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}