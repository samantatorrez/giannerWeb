  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 noPadding">
        <img class="imagenPortada" src="images/imagenPortada.jpg" alt="logo decoration">
      </div>
      <div class="col-md-4 noPadding">
        <div class="col-xs-10 col-xs-offset-1 presentacionLinea">
          <img class="logoReducido center-block" src="images/logoReducido.jpg" alt="logo">
          <p class="text-center">Línea de accesorios primavera-verano ¨La Catrina¨, inspirada en el festejo del día de los muertos mexicano.</p>
          <h3 class="text-center">Productos de la línea</h3>
          <ul>
            {foreach from=$productosCategorias item=prodcat}
              <li>{$prodcat['nombre']} ({$prodcat['nombre_categoria']})</li>
            {/foreach}
          </ul>
        </div>
      </div>
    </div>
  </div>
