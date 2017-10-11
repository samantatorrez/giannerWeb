<?php
  include_once 'view/View.php';

  class NavigationBarView extends View
  {

    public function mostrarIndex($productosCategorias)
    {
      $this->smarty->assign('productosCategorias', $productosCategorias);
      $this->smarty->display('index.tpl');
    }

    public function mostrarHome($productosCategorias)
    {
      $this->smarty->assign('productosCategorias', $productosCategorias);
      $this->smarty->display('home.tpl');
    }

    public function mostrarProductos($productos,$categorias)
    {
      $this->smarty->assign('productos', $productos);
      $this->smarty->assign('categorias', $categorias);
      $this->smarty->display('productos.tpl');
    }

    public function mostrarContactos()
    {
      $this->smarty->display('contactos.tpl');
    }

  }

?>
