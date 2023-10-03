<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
define ("__ROOT__",__DIR__);

// Configuration
require_once (__ROOT__.'/config.php');

// ApplicationController
require_once (CONTROLLERS_DIR.'/ApplicationController.php');


// Add routes here
ApplicationController::getInstance()->addRoute('user_add', CONTROLLERS_DIR.'/user_add.php');
ApplicationController::getInstance()->addRoute('connect', CONTROLLERS_DIR.'/connect.php');
ApplicationController::getInstance()->addRoute('disconnect', CONTROLLERS_DIR.'/disconnect.php');
ApplicationController::getInstance()->addRoute('upload', CONTROLLERS_DIR.'/upload.php');
ApplicationController::getInstance()->addRoute('index', CONTROLLERS_DIR.'/main.php');
ApplicationController::getInstance()->addRoute('account', CONTROLLERS_DIR.'/account.php');


ApplicationController::getInstance()->addRoute('test', CONTROLLERS_DIR.'/test.php');


// Process the request
ApplicationController::getInstance()->process();

?>
