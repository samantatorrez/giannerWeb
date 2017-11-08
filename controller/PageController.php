<?php
  require_once 'model/ProductModel.php';
  require_once 'model/CategoryModel.php';
  require_once 'view/PageView.php';

  class PageController extends Controller
  {
    private $productModel;
    private $categoryModel;

    function __construct()
    {
      $this->view = new PageView();
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
