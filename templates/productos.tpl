<section>
  <div class="container">
    <div class="row productos">
      <div class="col-sm-12 col-md-12">
        <form class="pull-right" action="listarXCategoria" method="GET">
          <div class="form-group">
            <label class="control-label col-sm-4">Categorias: </label>
            <div class="col-sm-8">
              <select class="form-control" id="getCategory">
                  <option>Todas</option>
                {foreach from=$categorias item=categoria}
                  <option>{$categoria['nombre']}</option>
                {/foreach}
              </select>
            </div>
          </div>
        </form>
      </div>
      <div class="col-sm-12 col-md-12">
        <h3>Lista de Productos</h3>
        <div class="table-responsive">
          <table class="table"  id="tablaProductos">
            <thead>
              <tr>
                <th>IMAGENES</th>
                <th>NOMBRE</th>
                <th>DECRIPCION</th>
                <th>MEDIDAS</th>
                <th>PRECIO</th>
              </tr>
            </thead>
            <tbody id="contenidoTabla">
              {include 'productosTabla.tpl'}
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-sm-12 col-md-12">
        <div id="ComentariosMessage">
        </div>
        <div id="ComentariosContent">
        </div>
      </div>
    </div>
  </div>
</section>
<script src="js/vistaProductos.js"></script>
