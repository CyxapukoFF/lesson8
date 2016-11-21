<?php

namespace models;


abstract class Model {
  abstract public function get($id);
  abstract public function all();
  abstract public function delete($id);
  abstract public function update($data);
  abstract public function insert($data);
  abstract public function asArray();
}
