<?php

namespace controllers;

use \models\my\User;
use \Auth;

class PageController extends Controller {

  public function indexAction() {

    // $user = new User();
    // $user->get(1);
    // Auth::login($user);
    print "<pre>";
    print_r(Auth::user());
    print_r($_SESSION);
exit;
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
