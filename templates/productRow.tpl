<tr>
  <td>{$product['id']}</td>
  <td>{$product['nombre']}</td>
  <td>{$product['medidas']}</td>
  <td>{$product['precio']}</td>
  <!-- <td>{$product['id_categoria']}</td> -->
  {foreach from=$categorias item=categoria}
    {if ($product['id_categoria'] === $categoria['id'])}
      <td>{$categoria['nombre']}</td>
    {/if}
  {/foreach}
  <td>{$product['descripcion']}</td>
  <td><button data-id= {$product['id']} type="button" class="btn btn-danger">Borrar</button></td>
  <td><button data-id= {$product['id']} type="button" class="btn btn-default">Editar</button></td>
</tr>
