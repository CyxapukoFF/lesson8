<?php


namespace models\my;
use \models\mysql\Model;

class User extends Model {
  protected $tableName = 'users';

  public function getByLogin($login) {
    $sql = implode(',', $this->fieldNames);
    $sql = "SELECT ". $sql ." FROM ". $this->tableName
          ." WHERE login='$login'";
    $res = mysql_query($sql);

    if ($data = mysql_fetch_assoc($res)) {
      $this->assign($data);
    }
  }
}
