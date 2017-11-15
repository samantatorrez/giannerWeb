<?php
  include_once (__DIR__ .'\..\exceptions\ListExceptions.php');
  include_once (__DIR__ .'\Controller.php');
  include_once (__DIR__ .'\..\model\UsuarioModel.php');
  class SecuredController extends Controller
  {
    protected $loginModel;
    function __construct()
    {
      session_start();
      $timeout = 1000000;
      $this->loginModel = new LoginModel();
    }
    protected function isAdmin(){
      return ($this->isLogged() && $this->loginModel->isAdmin($_SESSION['usuario'])) == 1 ? true : false;
    }
    protected function isLogged(){
      $timeout = 1000000;
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
