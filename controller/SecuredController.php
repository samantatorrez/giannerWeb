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
    }
    protected function isAdmin(){
      return ($this->isLogged() && $this->loginModel->isAdmin($_SESSION['usuario'])) == 1 ? true : false;
    }
    protected function isLogged(){
      $timeout = 100; // 100 segundos
      return (isset($_SESSION['usuario']) && (time() - $_SESSION['LAST_ACTIVITY'] < $timeout)) == 1 ? true : false;
    }
    protected function getUser(){
       if (isset($_SESSION['usuario'])){
         return $_SESSION['usuario'];
       } else {
         return '';
       }
    }

  }

?>
