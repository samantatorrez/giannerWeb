<tr>
  <td>
    {foreach from=$product['imagenes'] item=imagen}
      <img src="{$imagen['ruta']}" alt="Imagen del producto {$product['nombre']}" class="img-rounded">
    {/foreach}
  </td>
  <td>{$product['nombre']}</td>
  <td>{$product['medidas']}</td>
  <td>{$product['precio']}</td>
  {if $agregar}
    <td>{$product['nombre_categoria']}</td>
  {else}
    {foreach from=$categorias item=categoria}
      {if ($product['id_categoria'] === $categoria['id'])}
        <td>{$categoria['nombre']}</td>
      {/if}
    {/foreach}
  {/if}
  <td>{$product['descripcion']}</td>
  <td><button data-id= {$product['id']} type="button" class="btn btn-danger">Borrar</button></td>
  <td><button data-id= {$product['id']} type="button" class="btn btn-default">Editar</button></td>
</tr>
