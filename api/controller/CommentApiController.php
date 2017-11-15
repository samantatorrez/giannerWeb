<?php
require_once(__DIR__ .'\..\..\model\CommentModel.php');
require_once('Api.php');

class CommentApiController extends Api
{
  protected $model;

  function __construct()
  {
      parent::__construct();
      $this->model = new CommentModel();
  }

  public function getComments()
  {
      $comments = $this->model->getComments();
      return $this->json_response($comments, 200);
  }

  public function getCommentsByProduct($url_params = [])
  {
      $id_producto = $url_params[":id_producto"];
      $comment = $this->model->getCommentsByProduct($id_producto);
      if($comment)
        return $this->json_response($comment, 200);
      else
        return $this->json_response(false, 404);
  }

  public function deleteComment($url_params = [])
  {
      $id = $url_params[":id"];
      $comment = $this->model->getComment($id);
      if($comment)
      {
        $this->model->deleteComment($id);
        return $this->json_response("Borrado exitoso.", 200);
      }
      else
        return $this->json_response(false, 404);
  }

  public function addComment($url_params = []) {
    $body = json_decode($this->raw_data);
    $id_producto = $body->id_producto;
    $puntaje = $body->puntaje;
    $comentario = $body->comentario;
    $id= $this->model->addComment($id_producto, $puntaje, $comentario);
    $comentarioGuardado = $this->model->getComment($id);
    return $this->json_response($comentarioGuardado, 200);
  }
}
 ?>
