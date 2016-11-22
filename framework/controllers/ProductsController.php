<?php

namespace controllers;

use \models\my\Product;
use \Http;

class ProductsController extends Controller {

  public function indexAction() {

    $model = new Product();
    $this->view->list = $model->all();
    $this->view->render('products/index');
  }

  public function addAction() {
    if (isset($_GET['id'])) {
      if (!isset($_SESSION['cartItems'][$_GET['id']])) {
        $_SESSION['cartItems'][$_GET['id']] = 1;
      }
      else {
        $_SESSION['cartItems'][$_GET['id']]++;
      }
    }
    Http::redirect('/?c=products');
  }

  public function cartAction() {
    $list = array();
    if (isset($_SESSION['cartItems'])) {
      $ids = array_keys($_SESSION['cartItems']);
      $model = new Product();
      $list = $model->getByIds($ids);
    }
    $this->view->list = $list;
    $this->view->render('products/cart');
  }

  public function delAction() {
    unset($_SESSION['cartItems'][$_GET['id']]);
    Http::redirect('/?c=products&a=cart');
  }

}
