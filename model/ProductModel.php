<?php
  include_once 'DBModel.php';

  class ProductModel extends DBModel
  {

    function __construct()
    {
      parent::__construct();
    }

    #PRODUCTOS
    function obtenerProductos()
    {
      $sql  = 'SELECT * FROM `producto`';
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute();
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    function obtenerProducto($id)
    {
      $sql= 'SELECT * FROM producto WHERE id=?';
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute(array($id));
      return $sentencia->fetch();
    }

    function agregarProducto($nombre,$descripcion,$medidas,$precio,$id_categoria)
    {
      $sql= 'INSERT INTO producto(nombre, descripcion, medidas, precio, id_categoria)'
      .' VALUES(:nombre, :descripcion, :medidas, :precio, :id_categoria)';
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute(array(":nombre"=>$nombre,
                                  ":descripcion"=>$descripcion,
                                  ":medidas"=>$medidas,
                                  ":precio"=>$precio,
                                  ":id_categoria"=>$id_categoria));
      $producto = array('id' => $this->db->lastInsertId(),
                    'nombre' => $nombre,
                    'descripcion'=> $descripcion,
                    'medidas'=> $medidas,
                    'precio' => $precio,
                    'id_categoria' => $id_categoria );
      return $producto;
    }
    
    function borrarProducto($id)
    {
      $sql = 'DELETE FROM producto WHERE id= :id';
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute(array('id' => $id));
      if($sentencia->rowCount()==0){
        throw new DataBaseException("No es posible borrar este producto.");
      }
    }

    function editarProducto($id,$nombre,$descripcion,$medidas,$precio,$id_categoria)
    {
      $sql = 'UPDATE producto SET nombre=:nombre , descripcion=:descripcion ,
      medidas=:medidas , precio=:precio , id_categoria=:id_categoria WHERE
      id=:id';
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute(array(":id"=>$id,
                                  ":nombre"=>$nombre,
                                  ":descripcion"=>$descripcion,
                                  ":medidas"=>$medidas,
                                  ":precio"=>$precio,
                                  ":id_categoria"=>$id_categoria));
      $producto = array('id' => $id,
                    'nombre' => $nombre,
                    'descripcion'=> $descripcion,
                    'medidas'=> $medidas,
                    'precio' => $precio,
                    'id_categoria' => $id_categoria );

    if($sentencia->rowCount()==0){
      throw new DataBaseException("Error no es posible editar este producto.");
    }
    return $producto;
    }

    function obtenerProductosConNombreCategoria()
    {
      $sql  = 'SELECT producto.*, categoria.nombre as nombre_categoria FROM producto, categoria WHERE producto.id_categoria = categoria.id ';
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute();
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);

    }

  }

?>
