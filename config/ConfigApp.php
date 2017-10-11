<?php
  class ConfigApp{
    public static $ACTION = "action";
    public static $PARAMS = "params";
    public static $ACTIONS = [
      ''=> 'navigationBarController#mostrarIndex',
      'home'=> 'navigationBarController#mostrarHome',
      'productos' => 'navigationBarController#mostrarProductos',
      'contactos' => 'navigationBarController#mostrarContactos',
      'admin' => 'AdminController#mostrarAdmin',
      'agregarProducto' => 'AdminController#agregarProducto',
      'borrarProducto' => 'AdminController#borrarProducto',
      'editarProducto' => 'AdminController#editarProducto',
      'obtenerFormularioAgregarProducto' => 'AdminController#obtenerFormularioAgregarProducto',
      'obtenerFormularioEditarProducto' => 'AdminController#obtenerFormularioEditarProducto'
    ];
  }
 ?>
