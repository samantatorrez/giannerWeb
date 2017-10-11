<?php
  include_once 'model/UsuarioModel.php';
  include_once 'view/LoginView.php';

  class LoginController extends Controller
  {

    function __construct()
    {
      $this->view = new LoginView();
      $this->model = new LoginModel();
    }

    public function mostrarLogin()
    {
      $this->view->mostrarFormulario();
    }

    public function verificar()
    {
      if(!empty($_POST['usuario']) && !empty($_POST['password'])){
        $userName = $_POST['usuario'];
        $password = $_POST['password'];
        $user = $this->model->getUsuario($userName);
        if((!empty($user)) && password_verify($password, $user['password'])) {
          if ($user['role'] == 1) {
            session_start();
            $_SESSION['usuario'] = $userName;
            $_SESSION['LAST_ACTIVITY'] = time();
            var_dump(  $_SESSION['usuario']);
            header('Location: '.ADMIN);
          }
          else{
            $this->view->mostrarFormulario('Usted no tiene permiso para ingresar a modo administrador.');
          }
        }
        else{
          // header('Location: '.LOGIN);
          $this->view->mostrarFormulario('Usuario o Password incorrectos.');
        }
      }
    }

    public function cerrar()
    {
      session_start();
      session_destroy();
      header('Location: '.HOME);
    }

  }

?>
