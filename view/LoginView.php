<?php
  include_once 'view/View.php';

  class LoginView extends View
  {

    public function mostrarFormulario($error='')
    {
      $this->smarty->assign('error', $error);
      $this->smarty->display('login.tpl');
    }

    // public function MostrarError($error){
    //   $this->smarty->assign("error", $error);
    // }

  }

?>
