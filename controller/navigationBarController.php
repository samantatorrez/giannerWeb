<?php
  include_once 'model/ProductModel.php';
  include_once 'model/CategoryModel.php';
  include_once 'view/NavigationBarView.php';

  class NavigationBarController extends Controller
  {
    private $productModel;
    private $categoryModel;

    function __construct()
    {
      $this->view = new NavigationBarView();
    }

    public function mostrarIndex()
    {
      try {
        $this->productModel = new ProductModel();
        $productosCategorias = $this->productModel->obtenerProductosConNombreCategoria();
        $this->view->mostrarIndex($productosCategorias);
      } catch (Exception $e){
        $this->errorHandler($e->getMessage());
        error_log( $e->getMessage());
        throw $e;
      }
    }

    public function mostrarHome()
    {
      try {
        $this->productModel = new ProductModel();
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
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
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
