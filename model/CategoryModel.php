<?php
  include_once 'DBModel.php';

  class CategoryModel extends DBModel
  {

    function __construct()
    {
      parent::__construct();
    }
    #CATEGORIA
    function obtenerCategorias()
    {
      $sql  = 'SELECT * FROM `categoria`';
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute();
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    function obtenerCategoria($id)
    {
      $sql= 'SELECT * FROM categoria WHERE id=?';
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute(array($id));
      return $sentencia->fetch();
    }

    function agregarCategoria($nombre)
    {
      $sql= 'INSERT INTO categoria(nombre)'
      .' VALUES(:nombre)';
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute(array(":nombre"=>$nombre));
      $categoria = array('id' => $this->db->lastInsertId(),
                    'nombre' => $nombre);
      return $categoria;
    }

    function borrarCategoria($id)
    {
      $sql = 'DELETE FROM categoria WHERE id=?';
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute(array($id));
      if($sentencia->rowCount()==0){
        throw new DataBaseException("Error no es posible borrar esta categoria.");
      }
    }

    function editarCategoria($id,$nombre)
    {
      $sql = 'UPDATE categoria SET nombre=:nombre WHERE id=:id';
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute(array(":nombre"=>$nombre, ":id"=>$id));
      $categoria = array('id' => $id,
                    'nombre' => $nombre);
      if($sentencia->rowCount()==0){
        throw new DataBaseException("Error no es posible editar esta categoria.");
      }
      return $categoria;
    }

  }

?>
