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
          {include 'productRow.tpl'}
          {/foreach}
        </tbody>
      </table>
      <button id="agregarProducto" type="button" class="btn btn-dark btn-lg btn-block">Agregar Producto</button>
      <div id="mensajeFormulario">
      </div>
      <div class="col-sm-12 col-md-12 form-group">
        <form id="formularioProducto" action="agregarProducto" method="post" >
        </form>
      </div>
    </div>
    <hr>
    <div class="categorias col-sm-12 col-md-12">
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
    <div class="col-sm-12 col-md-12 form-group">
      <form id="nuevaCategoria" action="agregarCategoria" method="post">
        <h2> Agregar categoria</h2>
        <div class="form-group">
          <label for="nombre">Nombre:</label>
          <input type="text" name="nombre" class="form-control">
        </div>
        <button type="submit" class="btn btn-default">Agregar producto</button>
      </form>
    </div>
    </div>
</div>
<script src="js/tableEdition.js"></script>
