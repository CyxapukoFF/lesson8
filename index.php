<?php

//  http::/localhost:8888/index.php?
//    c=<controller_name>&a=<action_name>

// print '<pre>';
// print_r($_SERVER);
// exit;

function myAutoloader($className) {
  $c = str_replace('\\', DIRECTORY_SEPARATOR, $className);
  include_once('framework' . DIRECTORY_SEPARATOR .$c.'.php');
}

spl_autoload_register('myAutoloader');

function getController($name) {
  $cName = 'controllers\\'.ucfirst($name) .'Controller';
  $c = new $cName();
  $c->init();
  return $c;
}

$c = getController(isset($_GET['c']) ? $_GET['c'] : 'page');
$c->run();
