<?php


class Db {
  static public $conn;
  static public $db;

  static public function connect($db) {
    self::$conn = mysql_connect('localhost', 'root', '');
    self::$db = $db;
    mysql_select_db(self::$db);
  }
}
