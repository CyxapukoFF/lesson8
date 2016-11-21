<?php

namespace controllers;

use models\my\Test;
use \Auth;

class UserController extends Controller {

  public function indexAction() {
  }

  public function loginAction() {
    Auth::login($user);
  }

  public function logoutAction() {
    Auth::logout();
    header('Location: /');
    exit;
  }

}
