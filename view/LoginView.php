<?php
  include_once 'view/View.php';

  class LoginView extends View
  {

    public function mostrarFormulario($isSignUp)
    {
      $this->smarty->assign('isSignUp', $isSignUp);
      $this->smarty->display('login.tpl');
    }

    public function mostrarError($error, $isSignUp){
      $this->smarty->assign('error', $error);
      $this->smarty->assign('isSignUp', $isSignUp);
      $this->smarty->display('login.tpl');
    }

  }

?>
