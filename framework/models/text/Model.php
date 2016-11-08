<?php

namespace models\text;

class Model extends \models\Model {
  protected $file;
  protected $data;
  protected $fields;

  public function __construct($file) {
    if (file_exists($file)) {
      $this->file = $file;
      $rows = file($file);
      $ids = explode('|', $rows[0]);
      foreach ($ids as $id) {
        $this->fields[] = trim($id);
      }
      $n = count($rows);
      $m = count($this->fields);
      for ($i = 1; $i < $n; $i++) {
        $arr = explode('|', $rows[$i]);
        $arr1 = [];
        for ($j = 0; $j < $m; $j++) {
          $arr1[$this->fields[$j]] = trim($arr[$j]);
        }
        $this->data[$arr1['id']] = $arr1;
      }
    }
    else {
      echo 'File '.$file. ' doesn\'t exist!';
      exit(1);
    }
  }

  public function get($id) {
    return $this->data[$id];
  }

  public function all() {
    return $this->data;
  }

  public function delete($id) {
    unset($this->data[$id]);
    $this->writeFile();
  }

  public function update($data) {
    if(isset($data['id'])) {
      if (!isset($this->data[$data['id']])) {
        echo "Element with ID=".$data['id']." doesn\'t  exists";
        exit(1);
      }
    }
    else {
      echo "You must specify ID!";
      exit(1);
    }
    $arr = [];
    foreach ($this->fields as $id) {
      $arr[$id] = $data[$id];
    }
    $this->data[$data['id']] = $arr;

    $this->writeFile();
  }

  public function insert($data) {
    if(isset($data['id'])) {
      if (isset($this->data[$data['id']])) {
        echo "Element with ID=".$data['id']." exists";
        exit(1);
      }
    }

    $ids = array_keys($this->data);
    sort($ids);
    $ids = array_reverse($ids);

    $data['id'] = $ids[0]+1;
    foreach ($this->fields as $id) {
      $arr[$id] = $data[$id];
    }
    $this->data[$arr['id']] = $arr;

    $this->writeFile();
  }

  protected function writeFile() {
    $fp = fopen($this->file, "w");
    $str = implode('|', $this->fields);
    fprintf($fp, $str."\n");
    if (!empty($this->data)) {
      foreach ($this->data as $val) {
        $str = implode('|', $val);
        fprintf($fp, $str."\n");
      }
    }
    fclose($fp);
  }

}
