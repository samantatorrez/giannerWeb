<?php
  include_once 'controller/controller.php';
  include_once 'view/navigationBarView.php';

  class navigationBarController extends Controller
  {

    function __construct()
    {
      $this->view = new navigationBarView();
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
