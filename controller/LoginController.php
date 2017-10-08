<?php
  include_once 'controller/controller.php';
  include_once 'view/LoginView.php';

  class LoginController extends Controller
  {

    function __construct()
    {
      $this->view = new LoginView();
    }

    public function mostrarFormulario()
    {
      $this->view->mostrarFormulario();
    }

  }

?>
