  <div class="container-fluid">
    <div class="row productos">
      <ul>
        {foreach from=$categorias item=categoria}
          <li>{$categoria['nombre']}</li>
            <ul>
              {foreach from=$productos item=producto}
                {if $categoria['id'] == $producto['id_categoria']}
                  <li>{$producto['nombre']}</li>
                  <li>{$producto['descripcion']}</li>
                  <li>{$producto['precio']}</li>
                  <li>{$producto['medidas']}</li>
                  <hr>
                {/if}
              {/foreach}
            </ul>
          </li>
        {/foreach}
      </ul>
    </div>
  </div>
