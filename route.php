<?php
  define('ACTION', 0);
  define('PARAMS', 1);

  require_once 'config/ConfigApp.php';
  require_once 'model/DBModel.php';
  require_once 'view/View.php';
  require_once 'controller/Controller.php';
  require_once 'controller/NavigationBarController.php';
  require_once 'controller/AdminController.php';
  require_once 'controller/LoginController.php';
  require_once 'controller/SecuredController.php';

  function parseURL($url)
  {
    $urlExploded = explode('/', $url);
    $arrayReturn[ConfigApp::$ACTION] = $urlExploded[ACTION];
    $arrayReturn[ConfigApp::$PARAMS] = isset($urlExploded[PARAMS]) ? array_slice($urlExploded,1) : null;
    return $arrayReturn;
  }

  ini_set("log_errors", 1);
  ini_set("error_log", "tmp/php-error.log");

  try{
    if(isset($_GET['action'])){
      $urlData = parseURL($_GET['action']);
      $action = $urlData[ConfigApp::$ACTION]; //home
      if(array_key_exists($action,ConfigApp::$ACTIONS)){
        $params = $urlData[ConfigApp::$PARAMS];
        $action = explode('#',ConfigApp::$ACTIONS[$action]); //toma lo que esta despues del #
        $controller =  new $action[0]();
        $metodo = $action[1];
        if(isset($params) &&  $params != null){
          echo $controller->$metodo($params);
        }
        else{
          echo $controller->$metodo();
        }
      }
    }
  }
  catch (Exception $e){
      error_log( $e->getMessage());
  }

?>
