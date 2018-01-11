<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define ('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'].DS.'Katerina');

defined('LIB_PATH') ? null : define ('LIB_PATH',SITE_ROOT.DS.'include');


require_once(LIB_PATH.DS."config.php");
require_once(LIB_PATH.DS."function.php");
require_once(LIB_PATH.DS."session.php");
require_once(LIB_PATH.DS."accounts.php");
require_once(LIB_PATH.DS."products.php");
require_once(LIB_PATH.DS."productsin.php");
require_once(LIB_PATH.DS."origins.php");
require_once(LIB_PATH.DS."categories.php");
require_once(LIB_PATH.DS."customers.php");
require_once(LIB_PATH.DS."orders.php");
require_once(LIB_PATH.DS."branches.php");
require_once(LIB_PATH.DS."autonumbers.php");
require_once(LIB_PATH.DS."payments.php"); 
require_once(LIB_PATH.DS."settings.php"); 
require_once(LIB_PATH.DS."paginationproducts.php"); 

require_once(LIB_PATH.DS."database.php");
?>