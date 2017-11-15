<?php

  include_once(dirname(__DIR__).'/model/UsuarioModel.php');
  include_once(dirname(__DIR__).'/controller/Controller.php');
  include_once(dirname(__DIR__).'/controller/NavigationBarController.php');
  include_once(dirname(__DIR__).'/controller/SecuredController.php');
  include_once(dirname(__DIR__).'/view/LoginView.php');

  class LoginController extends SecuredController
  {

    function __construct()
    {
      parent::__construct();
      $this->view = new LoginView();
      $this->model = new LoginModel();
    }

    public function mostrarLogin()
    {
      $this->view->mostrarFormulario(false);
    }

    private function session($username){
      session_start();
      $_SESSION['usuario'] = $username;
      $_SESSION['LAST_ACTIVITY'] = time();
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

        if((!empty($user)) && password_verify($password, $user['password'])) {
          if ($user['role'] == 1){
            $this->session($userName);
            header('Location: '.ADMIN);
            die();
          } elseif ($user['role'] == 0) {
            $this->session($userName);
            header('Location: '.HOME);
            die();
          } else {
            $this->view->mostrarError('usted no tiene permiso para ingresar',false);
          }
        } else {
          $this->view->mostrarError('Usuario o Password incorrectos.',false);
        }
      } else {
          $this->view->mostrarError('Usuario o Password vacios.',false);
      }
    }

    public function cerrar()
    {
      session_start();
      session_destroy();
      header('Location: '.HOME);
    }

    public function agregarUsuario(){
      if(!empty($_POST['usuario']) && !empty($_POST['password'])){
          try{
            $userName = $_POST['usuario'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $role = 0;
            $user = $this->model->addUsuario($userName,$password,$role);
            $this->session($userName);
            header('Location: '.HOME);
          } catch (Exception $e){
            $this->view->mostrarError('Error al dar el alta.',true);
            error_log( $e->getMessage());
          }
        } else {
          $this->view->mostrarError('Usuario o Password incorrectos.',true);
        }
      }

    public function obtenerUsuarios(){
      try {
        $this->model->getUsuarios();
        $this->view->mostrarUsuarios();
      } catch (Exception $e) {
        $this->errorHandler($e->getMessage());
        error_log( $e->getMessage());
      }
    }

    public function eliminarUsuario($params){
      try {
        $id=$params[0];
        $this->model->borrarUsuario($id);
      } catch (Exception $e) {
        $this->errorHandler("Error al borrar Usuario.");
        error_log( $e->getMessage());
      }
    }

    public function mostrarSignUp(){
      $this->view->mostrarFormulario(true);
    }

  }

?>
