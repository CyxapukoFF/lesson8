<?php

namespace views;

class View {
  protected $data =array();
  protected $path;

  public function __construct($path) {
    $this->path = $path;
  }

  public function __set($name, $val) {
    $this->data[$name] = $val;
  }

  public function render($tpl) {
    extract($this->data);
    include($this->path . $tpl.'.php');
  }
}
