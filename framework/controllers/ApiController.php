<?php

namespace controllers;

use \models\my\Product;
use \Http;

class ApiController extends Controller {

  public function indexAction() {

    $model = new Product();
    $list = $model->all();
    $arr = array();
    foreach ($list as $item) {
      $arr[] = $item->asArray();
    }
    echo json_encode($arr);
    exit;
  }

    public function addAction() {
      if (isset($_POST["new_prod"])) {

        $model = new Product();
        $model->assign($_POST);
        $model->save();
        $array = array(
          "status" => "ok",
        );
        echo json_encode($array);
        exit;
      }
      $array = array(
        "status" => "error",
      );
      echo json_encode($array);
      exit;
    }

      public function deleteAction() {
        if (isset($_POST["id"])) {

          $model = new Product();
          $model->delete($_POST["id"]);
          $array = array(
            "status" => "ok",
          );
          echo json_encode($array);
          exit;
        }
        $array = array(
          "status" => "error",
        );
        echo json_encode($array);
        exit;
      }

}
