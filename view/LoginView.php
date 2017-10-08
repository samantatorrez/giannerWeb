<?php
  include_once 'view/View.php';

  class LoginView extends View
  {

    public function mostrarFormulario()
    {
      $this->smarty->display('login.tpl');
    }

  }

?>
