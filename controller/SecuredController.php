<?php
  include_once 'exceptions/ListExceptions.php';
  class SecuredController extends Controller
  {

    function __construct()
    {
      session_start();
      if (!isset($_SESSION['usuario'])) {
        header('Location: '.LOGIN);
        die();
      }
    }

    protected function errorHandler($error)
    {
      $this->view->mostrarError($error);
    }

  }

?>
