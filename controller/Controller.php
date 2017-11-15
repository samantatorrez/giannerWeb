<?php
  define('HOME', 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/');
  define('ADMIN', 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/admin');

  include_once (__DIR__ .'\..\exceptions\ListExceptions.php');

  define('LOGIN', 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/login');
  define('LOGOUT', 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/logout');

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
