<?php
  include_once(dirname(__DIR__).'/controller/controller.php');
  require_once(dirname(__DIR__).'/controller/loginController.php');
  require_once(dirname(__DIR__).'/model/ProductModel.php');
  require_once(dirname(__DIR__).'/model/CategoryModel.php');
  require_once(dirname(__DIR__).'/view/PageView.php');

  class PageController extends Controller
  {
    private $usuario;
		private $loginController;
    private $productModel;
    private $categoryModel;

    public function __construct()
    {
      $this->view = new PageView();
      // $this->$loginController = new LoginController();
      // $this->setUsuarioLogueado();
		}

		public function setUsuarioLogueado(){
			 $this->usuario=$this->loginController->usuarioLogueado();
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
      if (empty($categoria)) {
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
