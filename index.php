<?php

//  http::/localhost:8888/index.php?
//    c=<controller_name>&a=<action_name>

function myAutoloader($className) {
  $c = str_replace('\\', DIRECTORY_SEPARATOR, $className);
  include_once('framework' . DIRECTORY_SEPARATOR .$c.'.php');
}

spl_autoload_register('myAutoloader');

\Db::connect('lesson9');

function getController($name) {
  $cName = 'controllers\\'.ucfirst($name) .'Controller';
  $c = new $cName();
  $c->init();
  return $c;
}

$c = getController(isset($_GET['c']) ? $_GET['c'] : 'page');
$c->run();
