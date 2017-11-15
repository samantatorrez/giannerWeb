<?php
  require_once 'exceptions/ListExceptions.php';
  class SecuredController extends Controller
  {
    protected $loginModel;
    function __construct()
    {
      session_start();
      $timeout = 1000000; // 100 segundos
      $this->loginModel = new LoginModel();
      if (!isset($_SESSION['usuario']) || (time() - $_SESSION['LAST_ACTIVITY'] > $timeout)) {
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
