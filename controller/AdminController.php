<?php
 require_once 'model/ProductModel.php';
 require_once 'model/CategoryModel.php';
 require_once 'view/AdminView.php';
 require_once 'controller/SecuredController.php';

 class AdminController extends SecuredController
{
  private $productModel;
  private $categoryModel;

  function __construct()
  {
    parent::__construct();
    $this->view = new AdminView();
    try{
      $this->productModel= new ProductModel();
      $this->categoryModel= new CategoryModel();
    } catch (DataBaseException $e){
        $this->errorHandler($e->getMessage());
      throw $e;
    }
  }

  public function mostrarAdmin()
  {
    try {
      $productos= $this->productModel->obtenerProductos();
      $categorias= $this->categoryModel->obtenerCategorias();
      $this->view->mostrarAdmin($productos,$categorias);
    } catch (Exception $e){
      $this->errorHandler($e->getMessage());
      error_log( $e->getMessage());
      throw $e;
    }
  }

  public function agregarProducto(){
    try {
      if(!isset($_POST['nombre']) || empty($_POST['nombre'])){
        throw new ParameterRequiredException("Parametro obligatorio: nombre");
      }
      if(!isset($_POST['id_categoria']) || empty($_POST['id_categoria'])){
        throw new ParameterRequiredException("Parametro obligatorio: id categoria");
      }
      $nombre = $_POST['nombre'];
      $id_categoria = $_POST['id_categoria'];
      $descripcion = $_POST['descripcion'];
      $medidas = $_POST['medidas'];
      $precio = isset($_POST['precio']) ? $_POST['precio'] : 0;
      $producto = $this->productModel
                  ->agregarProducto($nombre,$descripcion,$medidas,$precio,$id_categoria);
      $this->view->obtenerFilaProducto($producto);
    } catch (ParameterRequiredException $e){
      $this->errorHandler($e->getMessage());
    } catch (DataBaseException $e){
      $this->errorHandler($e->getMessage());
    } catch (Exception $e) {
      $this->errorHandler("Error al agregar producto");
      error_log( $e->getMessage());
    }
  }

  public function agregarCategoria(){
    try {
      if(!isset($_POST['nombre']) || empty($_POST['nombre'])){
        throw new ParameterRequiredException("Parametro obligatorio: nombre");
      }
      $nombre = $_POST['nombre'];
      $categoria = $this->categoryModel
                  ->agregarCategoria($nombre);
      $this->view->obtenerFilaCategoria($categoria);
    } catch (ParameterRequiredException $e){
      $this->errorHandler($e->getMessage());
    } catch (DataBaseException $e){
      $this->errorHandler($e->getMessage());
    } catch (Exception $e) {
      $this->errorHandler("Error al agregar categoria");
      error_log( $e->getMessage());
    }
  }

  public function editarProducto()
  {
    try {
      if(!isset($_POST['id']) || empty($_POST['id'])){
        throw new ParameterRequiredException("Parametro obligatorio: id");
      }
      if(!isset($_POST['nombre']) || empty($_POST['nombre'])){
        throw new ParameterRequiredException("Parametro obligatorio: nombre");
      }
      if(!isset($_POST['id_categoria']) || empty($_POST['id_categoria'])){
        throw new ParameterRequiredException("Parametro obligatorio: id categoria");
      }

      $id= $_POST['id'];
      $nombre = $_POST['nombre'];
      $id_categoria = $_POST['id_categoria'];
      $descripcion = $_POST['descripcion'];
      $medidas = $_POST['medidas'];
      $precio = isset($_POST['precio']) ? $_POST['precio'] : 0;

      $producto = $this->productModel
                  ->editarProducto($id,$nombre,$descripcion,$medidas,$precio,$id_categoria);
      $this->view->obtenerFilaProducto($producto);
    } catch (ParameterRequiredException $e){
      $this->errorHandler($e->getMessage());
    } catch (DataBaseException $e){
      $this->errorHandler($e->getMessage());
    } catch (Exception $e) {
      $this->errorHandler("Error al editar producto.");
      error_log( $e->getMessage());
    }
  }

  public function editarCategoria()
  {
    try {
      if(!isset($_POST['id']) || empty($_POST['id'])){
        throw new ParameterRequiredException("Parametro obligatorio: id");
      }
      if(!isset($_POST['nombre']) || empty($_POST['nombre'])){
        throw new ParameterRequiredException("Parametro obligatorio: nombre");
      }

      $id= $_POST['id'];
      $nombre = $_POST['nombre'];

      $categoria = $this->categoryModel
                  ->editarCategoria($id,$nombre);
      $this->view->obtenerFilaCategoria($categoria);
    } catch (ParameterRequiredException $e){
      $this->errorHandler($e->getMessage());
    } catch (DataBaseException $e){
      $this->errorHandler($e->getMessage());
    } catch (Exception $e) {
      $this->errorHandler("Error al editar categoria.");
      error_log( $e->getMessage());
    }
  }

  public function borrarProducto($params)
  {
    try {
      $id=$params[0];
      $this->productModel->borrarProducto($id);
    } catch (DataBaseException $e){
      $this->errorHandler($e->getMessage());
    } catch (Exception $e) {
      $this->errorHandler("Error al borrar producto.");
      error_log( $e->getMessage());
    }
  }

  public function borrarCategoria($params)
  {
    try {
      $id=$params[0];
      $this->categoryModel->borrarCategoria($id);
    } catch (DataBaseException $e){
      $this->errorHandler($e->getMessage());
    } catch (Exception $e) {
      $this->errorHandler("Error al borrar Categoria.");
      error_log( $e->getMessage());
    }
  }

  //FORMULARIOS
  public function obtenerFormularioAgregarProducto()
  {
    try {
      $categorias= $this->categoryModel->obtenerCategorias();
      $this->view->mostrarFormularioAgregarProducto($categorias);
    } catch (Exception $e) {
      $this->errorHandler("Error al obtener formulario - producto.");
      error_log( $e->getMessage());
    }
  }

  public function obtenerFormularioEditarProducto($params)
  {
    try {
      $id=$params[0];
      $producto= $this->productModel->obtenerProducto($id);
      $categorias= $this->categoryModel->obtenerCategorias();
      $this->view->mostrarFormularioEditarProducto($categorias,$producto);
    } catch (Exception $e) {
      $this->errorHandler("Error al obtener formulario - producto.");
      error_log( $e->getMessage());
    }
  }

  public function obtenerFormularioEditarCategoria($params)
  {
    try {
      $id=$params[0];
      $categoria= $this->categoryModel->obtenerCategoria($id);
      $this->view->mostrarFormularioEditarCategoria($categoria);
    } catch (Exception $e) {
      $this->errorHandler("Error al obtener formulario - categoria.");
      error_log( $e->getMessage());
    }
  }

}

?>
