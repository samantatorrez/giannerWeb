<?php
  class ConfigApp{
    public static $ACTION = "action";
    public static $PARAMS = "params";
    public static $ACTIONS = [
      ''=> 'navigationBarController#mostrarIndex',
      'home'=> 'navigationBarController#mostrarHome',
      'productos' => 'navigationBarController#mostrarProductos',
      'contactos' => 'navigationBarController#mostrarContactos'
    ];
  }
 ?>
