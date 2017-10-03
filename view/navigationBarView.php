<?php
  include_once 'view/View.php';

  class navigationBarView extends View
  {

    public function mostrarIndex()
    {
      $this->smarty->display('index.tpl');
    }

    public function mostrarHome()
    {
      $this->smarty->display('home.tpl');
    }

    public function mostrarProductos()
    {
      $this->smarty->display('productos.tpl');
    }

    public function mostrarContactos()
    {
      $this->smarty->display('contactos.tpl');
    }

  }

?>
