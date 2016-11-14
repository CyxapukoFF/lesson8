<?php

namespace controllers;

use models\my\Test;

class PageController extends Controller {

  public function indexAction() {

    $model = new Test();
    $model->get(1);

    ///$model = Test::get(1);

    $this->view->model = $model;

    $this->view->title = 'Main page!!!';
    $this->view->render('page/index');
  }

  public function aboutAction() {
    $arr = array();
    for ($i = 0; $i < 10; $i++) {
      $str = "Item $i";
      $arr[] = $str;
    }
    $this->view->list = $arr;
    $this->view->text = 'Hello, World!!!';
    $this->view->render('page/about');
  }

  public function testAction() {
    $this->view->render('page/test');
  }

}
