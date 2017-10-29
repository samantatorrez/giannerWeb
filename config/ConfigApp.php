<?php
  class ConfigApp{
    public static $ACTION = "action";
    public static $PARAMS = "params";
    public static $ACTIONS = [
      ''=> 'PageController#mostrarIndex',
      'home'=> 'PageController#mostrarHome',
      'producto' => 'PageController#mostrarProductos',
      'contacto' => 'PageController#mostrarContactos',

      'listarXCategoria' => 'PageController#filtrarProductos',

      'admin' => 'AdminController#mostrarAdmin',
      'agregarProducto' => 'AdminController#agregarProducto',
      'borrarProducto' => 'AdminController#borrarProducto',
      'editarProducto' => 'AdminController#editarProducto',
      'obtenerFormularioAgregarProducto' => 'AdminController#obtenerFormularioAgregarProducto',
      'obtenerFormularioEditarProducto' => 'AdminController#obtenerFormularioEditarProducto',
      'agregarCategoria' => 'AdminController#agregarCategoria',
      'editarCategoria' => 'AdminController#editarCategoria',
      'borrarCategoria' => 'AdminController#borrarCategoria',
      'obtenerFormularioEditarCategoria' => 'AdminController#obtenerFormularioEditarCategoria',

      'login' => 'LoginController#mostrarLogin',
      'verificarUsuario' => 'LoginController#verificar',
      'logout' => 'LoginController#cerrar'
    ];
  }
 ?>
