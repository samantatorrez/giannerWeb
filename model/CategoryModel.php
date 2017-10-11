<?php
/**
 *
 */
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
    if($sentencia->rowCount()!=1){
      throw new DataBaseException("Error no coincide cantidad de filas modificadas");
    }
  }
  function editarCategoria($id,$nombre)
  {
    $sql = 'UPDATE tarea SET nombre=:nombre WHERE id=:id';
    $sentencia = $this->db->prepare($sql);
    $sentencia->execute(array(":nombre"=>$nombre, ":id"=>$id));
    return $sentencia->rowCount();
  }
}
 ?>
