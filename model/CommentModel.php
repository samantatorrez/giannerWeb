<?php
  include_once 'DBModel.php';

  class CommentModel extends DBModel
  {

    function __construct()
    {
      parent::__construct();
    }

    function getComments()
    {
      $sql  = 'SELECT * FROM `comentario`';
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute();
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    function getComment($id)
    {
      $sql= 'SELECT * FROM comentario WHERE id=:id limit 1';
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute(array(":id"=>$id));
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    function getCommentsByProduct($id_producto)
    {
      $sql= 'SELECT * FROM comentario WHERE id_producto=:id_producto';
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute(array(":id_producto"=>$id_producto));
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    function addComment($id_producto, $puntaje, $comentario)
    {
      $sql= 'INSERT INTO comentario(id_producto,puntaje,comentario)'
      .' VALUES(:id_producto,:puntaje,:comentario)';
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute(array(":id_producto"=>$id_producto,
                                ":puntaje"=>$puntaje,
                                ":comentario"=>$comentario
                              ));
      return $this->db->lastInsertId();
    }

    function deleteComment($id)
    {
      $sql = 'DELETE FROM comentario WHERE id=:id';
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute(array(":id"=>$id));
      if($sentencia->rowCount()==0){
        throw new DataBaseException("Error no es posible borrar esta comentario.");
      }
    }

  }

?>
