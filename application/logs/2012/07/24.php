<?php defined('SYSPATH') or die('No direct script access.'); ?>

2012-07-24 06:43:26 --- ERROR: View_Exception [ 0 ]: The requested view front/pages/ could not be found ~ SYSPATH/classes/kohana/view.php [ 252 ]
2012-07-24 06:43:26 --- STRACE: View_Exception [ 0 ]: The requested view front/pages/ could not be found ~ SYSPATH/classes/kohana/view.php [ 252 ]
--
#0 /home/s/sochi4x4ru/mdev.sochi4x4.ru/public_html/system/classes/kohana/view.php(137): Kohana_View->set_filename('front/pages/')
#1 /home/s/sochi4x4ru/mdev.sochi4x4.ru/public_html/system/classes/kohana/view.php(30): Kohana_View->__construct('front/pages/', Array)
#2 /home/s/sochi4x4ru/mdev.sochi4x4.ru/public_html/application/classes/controller/front.php(14): Kohana_View::factory('front/pages/', Array)
#3 [internal function]: Controller_Front->action_index()
#4 /home/s/sochi4x4ru/mdev.sochi4x4.ru/public_html/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Front))
#5 /home/s/sochi4x4ru/mdev.sochi4x4.ru/public_html/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 /home/s/sochi4x4ru/mdev.sochi4x4.ru/public_html/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#7 /home/s/sochi4x4ru/mdev.sochi4x4.ru/public_html/index.php(109): Kohana_Request->execute()
#8 {main}