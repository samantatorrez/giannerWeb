{foreach from=$productos item=producto}
  <tr>
    <td>
      <a href="" data-idprofesor="" class="detalles" id="producto">
        {if !(empty($producto['imagenes'][0]))}
          <img src="{$producto['imagenes'][0]['ruta']}" alt="Imagen de la tarea {$producto['nombre']}" class="img-rounded">
        {else}
          <p>Producto sin imagen</p>
        {/if}
      </a>
    </td>
    <td>{$producto['nombre']}</td>
    <td>{$producto['descripcion']}</td>
    <!-- <td>
      <a href="" data-idprofesor="" class="detalles" id="producto">
        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
      </a>
    </td> -->
    <!-- <td>{$producto['medidas']}</td>
    <td>{$producto['precio']}</td> -->
  </tr>
{/foreach}
