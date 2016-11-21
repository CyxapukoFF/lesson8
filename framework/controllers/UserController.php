<?php

namespace controllers;

use models\my\User;
use \Auth;
use \Http;

class UserController extends Controller {

  public function indexAction() {
    if (Auth::user() === NULL) {
      Http::redirect('/?c=user&a=login');
    }
    $this->view->user = Auth::user();
    $this->view->render('user/index');
  }

  public function loginAction() {
    if (Auth::user() !== NULL) {
      Http::redirect('/?c=user&a=index');
    }
    if (isset($_POST['login'])) {
      $user = new User();
      $user->getByLogin($_POST['login']);

      if ($user->id !== NULL && $user->pass = md5($_POST['password'])) {
        Auth::login($user);
        Http::redirect('/?c=user&a=index');
      }
    }
    $this->view->render('user/login');
  }

  public function logoutAction() {
    Auth::logout();
    Http::redirect('/');
  }

}
