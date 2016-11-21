<?php


class Http {
  static public function redirect($url) {
    header("Location: $url");
    exit;
  }
}
