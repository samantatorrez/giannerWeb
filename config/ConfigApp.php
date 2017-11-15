<?php
  class ConfigApp{
    public static $ACTION = "action";
    public static $PARAMS = "params";
    public static $ACTIONS = [
      ''=> 'NavigationBarController#mostrarIndex',
      'home'=> 'NavigationBarController#mostrarHome',
      'producto' => 'NavigationBarController#mostrarProductos',
      'contacto' => 'NavigationBarController#mostrarContactos',

      'listarXCategoria' => 'NavigationBarController#filtrarProductos',

      'admin' => 'AdminController#mostrarAdmin',
      'agregarProducto' => 'AdminController#agregarProducto',
      'borrarProducto' => 'AdminController#borrarProducto',
      'editarProducto' => 'AdminController#editarProducto',
      'obtenerFormularioAgregarProducto' => 'AdminController#obtenerFormularioAgregarProducto',
      'obtenerFormularioEditarProducto' => 'AdminController#obtenerFormularioEditarProducto',
      'agregarCategoria' => 'AdminController#agregarCategoria',
      'editarCategoria' => 'AdminController#editarCategoria',
      'borrarCategoria' => 'AdminController#borrarCategoria',
      'borrarUsuario' => 'AdminController#borrarUsuario',
      'agregarAdmin' => 'AdminController#agregarAdmin',
      'quitarAdmin' => 'AdminController#quitarAdmin',
      'obtenerFormularioEditarCategoria' => 'AdminController#obtenerFormularioEditarCategoria',

      'mostrarRegistrar' => 'LoginController#mostrarRegistrar',

      'login' => 'LoginController#mostrarLogin',
      'verificarUsuario' => 'LoginController#verificar',
      'signup' => 'LoginController#mostrarSignUp',
      'agregarUsuario' => 'LoginController#agregarUsuario',
      'logout' => 'LoginController#cerrar',


    ];
  }
 ?>
