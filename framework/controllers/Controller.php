<?php

namespace controllers;

use views\View;

class Controller {
  //protected $controller;
  protected $action = 'index';
  protected $view;

  public function init() {
    //$this->controller = $_GET['c'];
    if (isset($_GET['a'])) {
      $this->action     = $_GET['a'];
    }
    $this->view = new View($_SERVER['DOCUMENT_ROOT'] .'/tpl/');
  }

  public function run() {
    $a = $this->action .'Action';
    $this->$a();
  }

  public function __call($name, $arg) {
    echo 'Page not found!!!';
  }
}
