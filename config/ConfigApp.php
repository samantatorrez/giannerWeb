<?php
  class ConfigApp{
    public static $ACTION = "action";
    public static $PARAMS = "params";
    public static $ACTIONS = [
      ''=> 'NavigationBarController#mostrarIndex',
      'home'=> 'NavigationBarController#mostrarHome',
      'producto' => 'NavigationBarController#mostrarProductos',
      'contacto' => 'NavigationBarController#mostrarContactos',

      'admin' => 'AdminController#mostrarAdmin',

      'login' => 'LoginController#mostrarLogin',
      'verificarUsuario' => 'LoginController#verificar',
      'logout' => 'LoginController#cerrar'
    ];
  }
 ?>
