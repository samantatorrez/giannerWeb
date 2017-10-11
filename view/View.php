<?php
  include_once 'libs/smarty/Smarty.class.php';

  class View
  {
    protected $smarty;

    function __construct()
    {
      $this->smarty = new Smarty();
    }

    function mostrarError($errorMsg)
    {
      $this->smarty->assign('errorMsg', $errorMsg);
      $this->smarty->display('error.tpl');
    }
  }


?>
