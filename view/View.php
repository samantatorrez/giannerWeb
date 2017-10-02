<?php

  include_once 'libs/smarty/Smarty.class.php';

  class View
  {
    protected $smarty;

    function __construct()
    {
      $this->smarty = new Smarty();
    }
  }


?>
