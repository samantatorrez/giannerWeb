{foreach from=$productos item=producto}
  <tr>
    <td>
      {if !(empty($producto['imagenes'][0]))}
        <img src="{$producto['imagenes'][0]['ruta']}" alt="Imagen del producto {$producto['nombre']}" class="img-rounded">
      {else}
        <p>Producto sin imagen</p>
      {/if}
      </a>
    </td>
    <td>{$producto['nombre']}</td>
    <td>{$producto['descripcion']}</td>
    <td>{$producto['medidas']}</td>
    <td>{$producto['precio']}</td>
  </tr>
{/foreach}
