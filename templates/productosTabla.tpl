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
    <td>{$producto['medidas']}</td>
    <td>{$producto['precio']}</td>
    <td><button data-id= {$producto['id']} data-name={$producto['nombre']} type="button" class="btn btn-default">Comentarios</button></td>
  </tr>
{/foreach}
