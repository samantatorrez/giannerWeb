<?php
  require_once 'view/View.php';

  class LoginView extends View
  {

    public function mostrarFormulario($error='')
    {
      $this->smarty->assign('error', $error);
      $this->smarty->display('login.tpl');
    }

  }

?>
