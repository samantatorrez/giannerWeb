<?php
  include_once 'model/ProductModel.php';
  include_once 'model/CategoryModel.php';
  include_once 'view/AdminView.php';
  include_once 'controller/SecuredController.php';

  class AdminController extends SecuredController
  {
    private $productModel;
    private $categoryModel;

    function __construct()
    {
      parent::__construct();
      $this->view = new AdminView();
      $this->productModel= new ProductModel();
      $this->categoryModel= new CategoryModel();
    }

    public function mostrarAdmin()
    {
      $productos= $this->productModel->obtenerProductos();
      $categorias= $this->categoryModel->obtenerCategorias();
      $this->view->mostrarAdmin($productos,$categorias);
    }
  }

?>
