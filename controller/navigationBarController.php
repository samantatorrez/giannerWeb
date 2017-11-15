<?php
  include_once 'model/ProductModel.php';
  include_once 'model/CategoryModel.php';
  include_once 'view/NavigationBarView.php';
  include_once 'controller/SecuredController.php';

  class NavigationBarController extends SecuredController
  {
    private $productModel;
    private $categoryModel;

    function __construct()
    {
      parent::__construct();
      $this->view = new NavigationBarView();
      $this->productModel = new ProductModel();
      $this->categoryModel = new CategoryModel();
    }

    public function mostrarIndex()
    {
      try {
        $productosCategorias = $this->productModel->obtenerProductosConNombreCategoria();
        $this->view->mostrarIndex($productosCategorias,$this->isLogged(),$this->isAdmin(),$this->getUser());
      } catch (Exception $e){
        $this->errorHandler($e->getMessage());
        error_log( $e->getMessage());
        throw $e;
      }
    }

    public function mostrarHome()
    {
      try {
        $productosCategorias = $this->productModel->obtenerProductosConNombreCategoria();
        $this->view->mostrarHome($productosCategorias);
      } catch (Exception $e){
        $this->errorHandler($e->getMessage());
        error_log( $e->getMessage());
        throw $e;
      }
    }

    public function mostrarProductos()
    {
      try {
        $productos = $this->productModel->obtenerProductos();
        $categorias = $this->categoryModel->obtenerCategorias();
        $this->view->mostrarProductos($productos,$categorias);
      } catch (Exception $e){
        $this->errorHandler($e->getMessage());
        error_log( $e->getMessage());
        throw $e;
      }
    }

    public function mostrarContactos()
    {
      $this->view->mostrarContactos();
    }
  }

?>
