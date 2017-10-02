<?php
  class ConfigApp{
    public static $ACTION = "action";
    public static $PARAMS = "params";
    public static $ACTIONS = [
      ''=> 'index_Controller#mostrarIndex',
      'home'=> 'index_Controller#mostrarHome',
      'productos' => 'index_Controller#mostrarProductos',
      'contactos' => 'index_Controller#mostrarContactos'
    ];
  }
 ?>
