{foreach from=$productos item=producto}
  <tr>
    <td>{$producto['nombre']}</td>
    <td>{$producto['descripcion']}</td>
    <td>{$producto['medidas']}</td>
    <td>{$producto['precio']}</td>
  </tr>
{/foreach}
