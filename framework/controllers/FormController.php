<?php

namespace controllers;

use models\text\Model;
use \Http;

class FormController extends Controller {
  public function indexAction() {
    $model = new Model('data'.DIRECTORY_SEPARATOR.'data.txt');
    $this->view->list = $model->all();
    $this->view->render('form/index');
  }

  public function addAction() {
    $model = new Model('data'.DIRECTORY_SEPARATOR.'data.txt');
    if (isset($_POST['add'])) {
      $model->insert($_POST);
      Http::redirect('/?c=form');
    }
    $this->view->render('form/form');
  }

  public function editAction() {
    $model = new Model('data'.DIRECTORY_SEPARATOR.'data.txt');

    if (isset($_POST['id'])) {
      $model->update($_POST);
      Http::redirect('/?c=form');
    }

    if (isset($_GET['id'])) {
      $this->view->item = $model->get($_GET['id']);
      $this->view->render('form/form');
    }
    else {
      Http::redirect('/?c=form');
    }
  }

  public function deleteAction() {
    $model = new Model('data'.DIRECTORY_SEPARATOR.'data.txt');
    if (isset($_GET['id'])) {
      $model->delete($_GET['id']);
    }
    Http::redirect('/?c=form');
  }



}
