<?php
  require_once 'view/View.php';

  class AdminView extends View
  {

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

    function mostrarFormularioEditarCategoria($categoria)
    {
      $this->smarty->assign('categoria',$categoria);
      $this->smarty->display('categoryForm.tpl');
    }

    public function obtenerFilaProducto($product)
    {
      $agregar = true;
      $this->smarty->assign('agregar', $agregar);
      $this->smarty->assign('product', $product);
      $this->smarty->display('productRow.tpl');
    }

    public function obtenerFilaCategoria($categoria)
    {
      $this->smarty->assign('categoria', $categoria);
      $this->smarty->display('categoryRow.tpl');
    }

    public function mostrarHome($productos)
    {
      $this->smarty->assign('productos', $productos);
      $this->smarty->display('home.tpl');
    }

    public function mostrarProductos($productos, $categorias)
    {
      $this->smarty->assign('productos', $productos);
      $this->smarty->assign('categorias', $categorias);
      $this->smarty->display('productos.tpl');
    }

    public function mostrarAdmin($productos, $categorias)
    {
      $agregar = false;
      $this->smarty->assign('agregar', $agregar);
      $this->smarty->assign('productos', $productos);
      $this->smarty->assign('categorias', $categorias);
      $this->smarty->display('admin.tpl');
    }

  }

?>
