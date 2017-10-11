<div class="pull-right">
  <!-- {if isset($usuario)}
    <h5><strong>Hola!{$usuario['username']}</strong></h5>
  {/if} -->
  <button type="submit" class="btn btn-danger" id="btnlogout"><a href="logout">Cerrar Sesion</a></button>
</div>
<div class="container-fluid precios">
  <div class="blackFriday">
    <h1> Modo Administrador 💀🌺💀🌺</h1>
  </div>
  <div class="row">
    <div class="col-sm-12 col-md-12">
      <h2>🌺Productos🌺</h2>
      <table id="tablaProductos" class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Medidas</th>
            <th>Precio</th>
            <th>Id_categoria</th>
            <th>Descripción</th>
          </tr>
        </thead>
        <tbody>
          {foreach from=$productos item=product}
          <tr><td>{$product['id']}</td>
            <td>{$product['nombre']}</td>
            <td>{$product['medidas']}</td>
            <td>{$product['precio']}</td>
            <td>{$product['id_categoria']}</td>
            <td>{$product['descripcion']}</td>
            <td><button data-id= {$product['id']} type="button" class="btn btn-danger">Borrar</button></td>
          </tr>
          {/foreach}
        </tbody>
      </table>
    </div>
    <div class="col-sm-12 col-md-12">
      <form id="nuevoProducto">
        <h2 class="text-center"> Agregar producto</h2>
        <div class="form-group">
          <label>Nombre:</label>
          <input type="text" name="nombre" class="form-control">
        </div>
        <div class="form-group">
          <label>Medida:</label>
          <input type="text" name="medida" class="form-control">
        </div>
        <div class="form-group">
          <label>Precio:</label>
          <input type="text" name="precio" class="form-control">
        </div>
      </form>
    </div>
    <div class="col-sm-12 col-md-12">
      <h2>🌺Categorias🌺</h2>
      <table id="tablaCategorias" class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>nombre</th>
          </tr>
        </thead>
        <tbody>
          {foreach from=$categorias item=categoria}
          <tr><td>{$categoria['id']}</td>
            <td>{$categoria['nombre']}</td>
            <td><button data-id= {$categoria['id']} type="button" class="btn btn-danger">Borrar</button></td>
          </tr>
          {/foreach}
        </tbody>
      </table>
    </div>
  </div>
</div>
<script src="js/tableEdition.js"></script>
