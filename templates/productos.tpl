{include file="head.tpl"}
<div id="contenido">
  <div class="container-fluid">
    <div class="row productos">
      <div class="col-sm-12 col-md-4">
        <div class="thumbnail">
          <img class="imagenesProductos" src="images/mochilaCatrina.jpg" alt="mochilaCatrina">
          <div class="caption">
            <h3>Mochila Katrina Black. Línea ¨La Catrina¨ 2017.</h3>
            <ul>
              <li>Cuero napón liso bordeaux mate.</li>
              <li>Detalles en charol importado italiano bordeaux.</li>
              <li>Tela gobelino estampado con motivos florales, fondo negro.</li>
              <li>Herrajes baño oro.</li>
              <li>Texturado de tapa (referencia a caja toráxica humana)</li>
              <li>Cerradura de aperture por rotación.</li>
              <li>Bolsillo interno con cierre, abertura 18 cm.</li>
              <li>Apertura y cierre mediante ojales a tornillo de alta calidad y cordón de cuero con regulador de tensión.</li>
              <li>Tapones dorados pirámide en base.</li>
              <li>Correas regulables con hebillas.</li>
              <li>Medidas: 30 x 29 x 19 cm.</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-4">
        <div class="thumbnail">
          <img class="imagenesProductos" src="images/morralPeque.jpg" alt="morralPequeño">
          <div class="caption">
            <h3>Morral pequeño "Isabella". Línea ¨La Catrina¨ 2017.</h3>
            <ul>
              <li>Cuero napón liso bordeaux mate.</li>
              <li>Detalles en charol importado italiano bordeaux.</li>
              <li>Tela gobelino estampado con motivos florales, fondo negro.</li>
              <li>Herrajes baño oro.</li>
              <li>Texturado de tapa (referencia a columna vertebral)</li>
              <li>Cerradura de aperture por rotación.</li>
              <li>Bolsillo delantero con vivo de cuero.</li>
              <li>Tapones dorados pirámide en base.</li>
              <li>Correa superior de agarre con detalle de remache piramide dirado.</li>
              <li>Llavero extraible en cuero liso bordeaux y charol italiano con logo Gianner</li>
              <li>Medidas: 32 x 25 x 7 cm.</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-4">
        <div class="thumbnail">
          <img class="imagenesProductos" src="images/billeteraLolita.jpg" alt="billeteraLolita">
          <div class="caption billeteraLolita">
            <h3>Billetera "Lolita". Linea ¨La Catrina¨ 2017</h3>
            <ul>
              <li>Cuero exterior grabado ¨caviar¨ rosa tropic.</li>
              <li>Gobelino floreado.</li>
              <li>Logo Gianner con baño oro.</li>
              <li>Cierre de bronce negro.</li>
              <li>Deslizador con capuchón dorado con rosa de cuero.</li>
              <li>Tarjetero interno con 12 compartimientos.</li>
              <li>Monedero interno con cierre y deslizador.</li>
              <li>Interior en shantung negro bordado.</li>
              <li>Medidas: 21 x 12 cm.</li>
            </ul>
          </div>
          </div>
        </div>
      </div>
    </div>
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
              <td><button data-id=\"{3}\"type=\"button\"class=\"btn btn-danger\">Borrar</button></td>
            </tr>
            {/foreach}
          </tbody>
        </table>
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
              <td><button data-id=\"{3}\"type=\"button\"class=\"btn btn-danger\">Borrar</button></td>
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
          <button type="button" class="btn btn-default pull-right" id="agregarPrecio">Agregar</button>
          <button type="button" class="btn btn-default pull-right" id="agregarInstantaneo">Agregar instantaneo</button>
        </form>
      </div>
    </div>
  </div>
  <script src="js/tableEdition.js"></script>
</div>
{include file="foot.tpl"}
