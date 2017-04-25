<?php

namespace models\mysql;


class Model extends \models\Model {
  protected $tableName = '';
  protected $fieldNames = array();
  protected $data = array();
  //static public $conn;

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
    $sql = "SELECT ". $sql ." FROM ". $this->tableName
          ." WHERE id=$id";
    $res = mysql_query($sql);

    if ($data = mysql_fetch_assoc($res)) {
      $this->assign($data);
    }
  }


  public function all() {
    $sql = "SELECT * FROM $this->tableName";
    $res = mysql_query($sql);
    $arr = array();
    $class = get_class($this);
    while ($row = mysql_fetch_assoc($res)) {
      $model = new $class();
      $model->assign($row);
      $arr[] = $model;
    }
    return $arr;
  }


  public function delete($id) {
    mysql_query("DELETE FROM $this->tableName WHERE id = $id");
  }


  public function update($data) {
    if (!isset($data['id'])) {
      return;
    }
    $fieldsArr = array();
    foreach ($this->fieldNames as $fld) {
      if ($fld != 'id' && isset($data[$fld])) {
          $fieldsArr[] = $fld .'=\''. $data[$fld] .'\'';
      }
    }
    $fields = implode(', ', $fieldsArr);
    $sql = "UPDATE $this->tableName SET $fields WHERE id = ${data['id']}";
    $res = mysql_query($sql);
  }


  public function insert($data) {
    if (isset($data['id'])) {
      return;
    }
    $fieldsArr = array();
    $valuesArr = array();
    foreach ($this->fieldNames as $fld) {
      if ($fld != 'id') {
          if (!isset($data[$fld])) {
            print "Field $fld is not set in \$data!";
            exit(1);
          }
          $fieldsArr[] = "`$fld`";
          $valuesArr[] = "'". $data[$fld] ."'";
      }
    }
    $fieldsStr = implode(', ', $fieldsArr);
    $valuesStr = implode(', ', $valuesArr);
    $sql = "INSERT INTO $this->tableName ($fieldsStr) VALUES ($valuesStr)";
    //print $sql; exit;
    mysql_query($sql);
  }

  public function save() {
    if (isset($this->id)) {
      $this->update($this->data);
    }
    else {
      $this->insert($this->data);
    }
  }

  protected function exists($id) {
    $sql = "SELECT id FROM ". $this->tableName
          ." WHERE id=$id";
    $res = mysql_query($sql);
    if (mysql_num_rows($res) > 0) {
      return TRUE;
    }
    else {
      return FALSE;
    }
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
