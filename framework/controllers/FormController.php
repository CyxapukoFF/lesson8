<?php

namespace controllers;

use models\text\Model;

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
      header('Location: /?c=form');
    }
    $this->view->render('form/form');
  }

  public function editAction() {
    $model = new Model('data'.DIRECTORY_SEPARATOR.'data.txt');

    if (isset($_POST['id'])) {
      $model->update($_POST);
      header('Location: /?c=form');
    }

    if (isset($_GET['id'])) {
      $this->view->item = $model->get($_GET['id']);
      $this->view->render('form/form');
    }
    else {
      header('Location: /?c=form');
    }
  }

  public function deleteAction() {
    $model = new Model('data'.DIRECTORY_SEPARATOR.'data.txt');
    if (isset($_GET['id'])) {
      $model->delete($_GET['id']);
    }
    header('Location: /?c=form');
  }



}
