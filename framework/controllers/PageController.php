<?php

namespace controllers;

use models\text\Model;

class PageController extends Controller {

  public function indexAction() {

    // @todo
    $model = new Model($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR .'data'. DIRECTORY_SEPARATOR .'data.txt');
    $model->delete(1);
    $this->view->title = 'Main page!!!';
    $this->view->render('page/index');
  }

  public function aboutAction() {
    $arr = [];
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
