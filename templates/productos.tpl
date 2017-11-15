<section>
  <div class="container">
    <div class="row productos">
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
      <h3>Lista de Productos</h3>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
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
  </div>
</section>
