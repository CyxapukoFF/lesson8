<?php

use \models\Model;

class Auth {
  static protected $user = NULL;

  static public function login(Model $user) {
    $authUser = $user->asArray();
    $authUser['_class'] = get_class($user);
    $_SESSION['authUser'] = $authUser;
  }

  static public function logout() {
    unset($_SESSION['authUser']);
  }

  static public function user() {
    if (!isset($_SESSION['authUser'])) {
      return NULL;
    }

    if (self::$user === NULL) {
      self::$user = new $_SESSION['authUser']['_class'];
      self::$user->assign($_SESSION['authUser']);
    }
    return self::$user;
  }
}
