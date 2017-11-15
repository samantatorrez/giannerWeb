<?php
  include_once 'view/View.php';

  class NavigationBarView extends View
  {

    public function mostrarIndex($productosCategorias,$isLogged,$isAdmin,$getUser)
    {
      $this->smarty->assign('productosCategorias', $productosCategorias);
      $this->smarty->assign('isLogged',$isLogged);
      $this->smarty->assign('isAdmin',$isAdmin);
      $this->smarty->assign('getUser', $getUser);
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
