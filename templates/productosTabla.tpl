{foreach from=$productos item=producto}
  <tr>
    <td>
      {foreach from=$producto['imagenes'] item=imagen}
        <img src="{$imagen['ruta']}" alt="Imagen de la tarea {$producto['nombre']}" class="img-thumbnail">
      {/foreach}
    </td>
    <td>{$producto['nombre']}</td>
    <td>{$producto['descripcion']}</td>
    <td>{$producto['medidas']}</td>
    <td>{$producto['precio']}</td>
  </tr>
{/foreach}
