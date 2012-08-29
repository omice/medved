<?php defined('SYSPATH') or die('No direct script access.'); ?>

2012-07-19 21:20:11 --- ERROR: ErrorException [ 1 ]: Class 'Controller_Base_Front' not found ~ APPPATH/classes/controller/front.php [ 3 ]
2012-07-19 21:20:11 --- STRACE: ErrorException [ 1 ]: Class 'Controller_Base_Front' not found ~ APPPATH/classes/controller/front.php [ 3 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler('controller_fron...')
#1 {main}
2012-07-19 21:45:50 --- ERROR: HTTP_Exception_404 [ 404 ]: Product not found! ~ APPPATH/classes/controller/front.php [ 7 ]
2012-07-19 21:45:50 --- STRACE: HTTP_Exception_404 [ 404 ]: Product not found! ~ APPPATH/classes/controller/front.php [ 7 ]
--
#0 [internal function]: Controller_Front->action_index()
#1 /home/s/sochi4x4ru/mdev.sochi4x4.ru/public_html/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Front))
#2 /home/s/sochi4x4ru/mdev.sochi4x4.ru/public_html/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#3 /home/s/sochi4x4ru/mdev.sochi4x4.ru/public_html/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#4 /home/s/sochi4x4ru/mdev.sochi4x4.ru/public_html/index.php(109): Kohana_Request->execute()
#5 {main}