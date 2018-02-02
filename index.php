<?php
/////////////////// 1 //////////////////


//Файл со всеми стилями и скриптами
include ('plug_in_file.php');

// вывод ошибок
ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));
require_once (ROOT.'/components/Router.php');

$router = new Router();
$router -> run();
?>