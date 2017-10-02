<?php
  include_once 'controller/controller.php';
  include_once 'view/index_View.php';

  class index_Controller extends Controller
  {

    function __construct()
    {
      $this->view = new index_View();
    }

    public function mostrarIndex()
    {
      $this->view->mostrarIndex();
    }

    public function mostrarHome()
    {
      $this->view->mostrarHome();
    }

    public function mostrarProductos()
    {
      $this->view->mostrarProductos();
    }

    public function mostrarContactos()
    {
      $this->view->mostrarContactos();
    }

  }

?>
