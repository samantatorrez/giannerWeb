{foreach from=$productos item=producto}
  <tr>
    <td>
        {if !(empty($producto['imagenes'][0]))}
          {{foreach from=$producto['imagenes'] item=imagen}}
          <img src="{$imagen['ruta']}" alt="Imagen de la tarea {$producto['nombre']}" class="img-rounded">
          {{/foreach}}
        {else}
          <p>Producto sin imagen</p>
        {/if}
    </td>
    <td>{$producto['nombre']}</td>
    <td>{$producto['descripcion']}</td>
    <td>{$producto['medidas']}</td>
    <td>{$producto['precio']}</td>
    <td><button data-id= {$producto['id']} data-name={$producto['nombre']} type="button" class="btn btn-default">Comentarios</button></td>

  </tr>
{/foreach}
