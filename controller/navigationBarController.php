<?php
  include_once 'controller/controller.php';
  include_once 'view/NavigationBarView.php';

  class NavigationBarController extends Controller
  {

    function __construct()
    {
      $this->view = new NavigationBarView();
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
