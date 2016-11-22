<?php


namespace models\my;
use \models\mysql\Model;

class Product extends Model {
  protected $tableName = 'products';

  public function getByIds($idArr) {
    $list = implode(',', $idArr);
    $sql = "SELECT * FROM $this->tableName WHERE id IN ($list)";
    $res = mysql_query($sql);
    $arr = array();
    $class = get_class($this);
    if ($res) {
      while ($row = mysql_fetch_assoc($res)) {
        $model = new $class();
        $model->assign($row);
        $arr[] = $model;
      }
    }
    return $arr;
  }


}
