<?php
  include_once 'view/View.php';

  class AdminView extends View
  {
    
    public function mostrarAdmin($productos, $categorias)
    {
      $this->smarty->assign('productos', $productos);
      $this->smarty->assign('categorias', $categorias);
      $this->smarty->display('admin.tpl');
    }

  }

?>
