<?php
  define('HOME', 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/');
  include_once 'exceptions/ListExceptions.php';
  class Controller
  {
    protected $view;
    protected $model;

    protected function errorHandler($error)
    {
      $this->view->mostrarError($error);
    }
  }

?>
