<?php

namespace models\mysql;


class Model extends \models\Model {
  protected $tableName = '';
  protected $fieldNames = array();
  protected $data = array();
  static public $conn;

  public function __construct() {
    $this->init();
  }

  public function init() {
    $res = mysql_query("DESCRIBE $this->tableName");

    while($result = mysql_fetch_assoc($res)) {
      $this->fieldNames[] = $result['Field'];
    }
  }

  public function assign($data) {
    foreach($this->fieldNames as $fld) {
      $this->data[$fld] = $data[$fld];
    }
  }

  public function get($id) {
    $sql = implode(',', $this->fieldNames);
    $sql = "SELECT ". $sql ." FROM ". $this->tableName;
    $res = mysql_query($sql);

    if ($data = mysql_fetch_assoc($res)) {
      $this->assign($data);
    }
  }


  public function all() {

  }


  public function delete($id) {

  }


  public function update($data) {

  }


  public function insert($data) {

  }

  public function save() {
    
  }

  public function __get($fld) {
    if (isset($this->data[$fld])) {
      return $this->data[$fld];
    }
    else {
      return NULL;
    }
  }

  public function __set($fld, $val) {
    $this->data[$fld] = $val;
  }

}
