<?php
define('RESOURCE', 0);
define('PARAMS', 1);
include_once '../model/CommentModel.php';
include_once 'controller/CommentApiController.php';
include_once 'config/router.php';

  $router = new Router();
  //url, verb, controller, method
  $router->AddRoute("comments", "GET", "CommentApiController", "getComments");
  $router->AddRoute("comments/:id_producto", "GET", "CommentApiController", "getCommentsByProduct");
  $router->AddRoute("comments/", "POST", "CommentApiController", "addComment");
  $router->AddRoute("comments/:id", "DELETE", "CommentApiController", "deleteComment");
  $route = $_GET['resource'];
  $array = $router->Route($route);
  if(sizeof($array) == 0)
    echo "404";
  else
  {
    $controller = $array[0];
    $metodo = $array[1];
    $url_params = $array[2];
    echo (new $controller())->$metodo($url_params);
  }
 ?>
