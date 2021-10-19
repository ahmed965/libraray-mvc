<?php
class Controller {
  public function view($view, $data=[]) {
    if(file_exists('./view/' . $view . '.php')) {
      require './view/'. $view . '.php';
    } else {
      die('file doesn\'t exist');
    }
  }
}