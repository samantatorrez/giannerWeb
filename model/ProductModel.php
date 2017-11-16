<?php
  require_once 'DBModel.php';

  class ProductModel extends DBModel
  {

    function __construct()
    {
      parent::__construct();
    }

    #PRODUCTOS
    function obtenerProductos()
    {
      $productosImg = [];
      $sql  = 'SELECT * FROM `producto`';
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute();
      $productos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
      foreach ($productos as $producto) {
        $imagenes = $this->getImagenes($producto['id']);
        //imagenes tiene [[id_imagen, ruta],[id_imagen, ruta], [id_imagen, ruta]]
        $producto['imagenes'] = $imagenes;
        //producto va a agregar la key 'imagenes', entonces tiene
        // id, nombre, descripcion, precio, medidas, imagenes(arreglo)
        $productosImg[] = $producto;
      }
      return $productosImg;
    }

    function obtenerProducto($id)
    {
      $sql= 'SELECT * FROM producto WHERE id=:id';
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute(array('id' => $id));
      $producto = $sentencia->fetch();
      $imagenes = $this->getImagenes($id);
      $producto['imagenes'] = $imagenes;
      return $producto;
    }

    private function getImagenes($id)
    {
      $sql= 'SELECT * FROM imagen WHERE fk_id_producto=:id';
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute(array('id' => $id));
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    private function deleteImagen($id_prd)
    {
      $sql = 'DELETE FROM imagen WHERE fk_id_producto=:id';
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute(array('id' => $id_prd));
    }

    public function deleteImgById($id_img)
    {
      $sql = 'DELETE FROM imagen WHERE id=:id';
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute(array('id' => $id_img));
    }

    private function subirImagenes($imagenes,$nombre){
      $rutas = [];
      $index = 0;
      foreach ($imagenes as $imagen) {
        $destino = 'images/uploaded/' . $nombre . $index . '.jpg';
        move_uploaded_file($imagen, $destino);
        $rutas[]=$destino;
        $index++;
      }
      return $rutas;
    }

    function agregarProducto($nombre,$descripcion,$medidas,$precio,$id_categoria,$imagenes)
    {
      $sql= 'INSERT INTO producto(nombre, descripcion, medidas, precio, id_categoria)'
      .' VALUES(:nombre, :descripcion, :medidas, :precio, :id_categoria)';
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute(array(":nombre"=>$nombre,
                                  ":descripcion"=>$descripcion,
                                  ":medidas"=>$medidas,
                                  ":precio"=>$precio,
                                  ":id_categoria"=>$id_categoria));
      $id_prod = $this->db->lastInsertId();
      $rutas = $this->subirImagenes($imagenes,$nombre);
      $sqlImg = 'INSERT INTO imagen(ruta, fk_id_producto) VALUES(?, ?)';
      $sentencia_imagenes = $this->db->prepare($sqlImg);
      foreach ($rutas as $ruta) {
        $sentencia_imagenes->execute([$ruta,$id_prod]);
      }
      return $id_prod;
    }

    function borrarProducto($id)
    {
      $this->deleteImagen($id);
      $sql = 'DELETE FROM producto WHERE id= :id';
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute(array('id' => $id));
      if($sentencia->rowCount()==0){
        throw new DataBaseException("No es posible borrar este producto.");
      }
    }

    function editarProducto($id,$nombre,$descripcion,$medidas,$precio,$id_categoria,$imagenes)
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
      // $producto = array('id' => $id,
      //               'nombre' => $nombre,
      //               'descripcion'=> $descripcion,
      //               'medidas'=> $medidas,
      //               'precio' => $precio,
      //               'id_categoria' => $id_categoria );


      // return $producto;
    }

    public function filtrarxCategoria($categoria)
    {
      $productosImg = [];
      $sql = 'SELECT * FROM producto WHERE id_categoria = (SELECT id FROM categoria WHERE nombre = :categoria)';
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute(array(":categoria"=>$categoria));
      $productos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
      foreach ($productos as $producto) {
        $imagenes = $this->getImagenes($producto['id']);
        $producto['imagenes'] = $imagenes;
        $productosImg[] = $producto;
      }
      return $productosImg;
    }

    function obtenerProductosConNombreCategoria()
    {
      $sql  = 'SELECT producto.*, categoria.nombre AS nombre_categoria FROM producto, categoria WHERE producto.id_categoria = categoria.id ';
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute();
      $productos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
      // $imagenes = $this->getImagenes($productos['id']);
      // $productos['imagenes'] = $imagenes;
      return $productos;
    }

    function obtenerProductoConNombreCategoria($id_prod)
    {
      $sql  = 'SELECT producto.*, categoria.nombre AS nombre_categoria FROM producto, categoria WHERE producto.id = ? && producto.id_categoria = categoria.id ';
      // $sql = 'SELECT * FROM producto WHERE id = ?';
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute([$id_prod]);
      $producto = $sentencia->fetch();
      $imagenes = $this->getImagenes($id_prod);
      $producto['imagenes'] = $imagenes;
      return $producto;
    }

  }

?>
