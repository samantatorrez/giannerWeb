<?php
include_once 'view/View.php';
/**
 *
 */
class AdminView extends View
{
  public function mostrarAdmin($productos, $categorias)
  {
    $this->smarty->assign('productos', $productos);
    $this->smarty->assign('categorias', $categorias);
    $this->smarty->display('admin.tpl');
  }
  public function mostrarFormularioAgregarProducto($categorias){
    $productFormAction="Agregar Producto";
    $isOnEdition=false;
    $this->smarty->assign('productFormAction', $productFormAction);
    $this->smarty->assign('categorias', $categorias);
    $this->smarty->assign('isOnEdition', $isOnEdition);
    $this->smarty->display('productForm.tpl');
  }

  public function mostrarFormularioEditarProducto($categorias,$producto){
    $productFormAction="Editar Producto";
    $isOnEdition=true;
    $this->smarty->assign('productFormAction', $productFormAction);
    $this->smarty->assign('categorias', $categorias);
    $this->smarty->assign('isOnEdition', $isOnEdition);
    $this->smarty->assign('product',$producto);
    $this->smarty->display('productForm.tpl');
  }

  public function obtenerFilaProducto($product)
  {
    $this->smarty->assign('product', $product);
    $this->smarty->display('productRow.tpl');
  }
}

 ?>
