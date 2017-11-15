<?php

  include_once(dirname(__DIR__).'/model/UsuarioModel.php');
  include_once(dirname(__DIR__).'/controller/Controller.php');
  include_once(dirname(__DIR__).'/controller/NavigationBarController.php');
  include_once(dirname(__DIR__).'/view/LoginView.php');

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

    public function usuarioLogueado(){
     session_start();
     if(isset($_SESSION['USER'])) {
       $usuario = $this->model->getUsuario($_SESSION['USER']);
           return $usuario;
       }
     }

    public function mostrarRegistrar()
    {
      $this->view->mostrarFormularioReg();
    }

    public function verificar()
    {
      if(!empty($_POST['usuario']) && !empty($_POST['password'])){
        $userName = $_POST['usuario'];
        $password = $_POST['password'];
        $user = $this->model->getUsuario($userName);
        print_r($user);
        die();
        if((!empty($user)) && password_verify($password, $user['password'])) {

          // session_start();
          // $_SESSION['usuario'] = $userName;
          // $_SESSION['LAST_ACTIVITY'] = time();
          // // header('Location: '.ADMIN);
          // if ($user['role'] == 1) {
          //   header('Location: '.ADMIN);
          // }
          // else {
          //   header('Location: '.HOME);
          // }
          if ($user['role'] == 1) {
            session_start();
            $_SESSION['usuario'] = $userName;
            $_SESSION['LAST_ACTIVITY'] = time();
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
