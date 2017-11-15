<?php

  include_once(dirname(__DIR__).'/controller/controller.php');
  require_once(dirname(__DIR__).'/controller/loginController.php');
  require_once(dirname(__DIR__).'/model/ProductModel.php');
  require_once(dirname(__DIR__).'/model/CategoryModel.php');
  require_once(dirname(__DIR__).'/view/NavigationBarView.php');

  class NavigationBarController extends Controller
  {
    private $productModel;
    private $categoryModel;

    public function __construct()
    {
      $this->view = new NavigationBarView();
      $this->productModel = new ProductModel();
      $this->categoryModel = new CategoryModel();
    }

    public function mostrarIndex()
    {
      try {

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
        $productosCategorias = $this->productModel->obtenerProductosConNombreCategoria();
        $this->view->mostrarHome($productosCategorias);
      } catch (Exception $e){
        $this->errorHandler($e->getMessage());
        error_log( $e->getMessage());
        throw $e;
      }
    }

    public function mostrarHomeLogged()
    {
      try {
        $productosCategorias = $this->productModel->obtenerProductosConNombreCategoria();
        $this->view->mostrarHomeLogged($productosCategorias);
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

    public function filtrarProductos()
    {
      $this->productModel = new ProductModel();
      $categoria = $_GET['valCategoria'];
      if ($categoria === 'Todas') {
        $productos = $this->productModel->obtenerProductos();
        $this->view->mostrarxCategoria($productos);
      }
      else
      {
        $productosFiltrados = $this->productModel->filtrarxCategoria($categoria);
        if (!empty($productosFiltrados)) {
          $this->view->mostrarxCategoria($productosFiltrados);
        }
        else{
          echo "No hay productos que sean de esta categoria.";
        }
      }

      // try {
      //
      // } catch (Exception $e) {
      //   $this->errorHandler("No hay productos que sean de esa categoria.");
      //   error_log( $e->getMessage());
      // }
    }

  }

?>
