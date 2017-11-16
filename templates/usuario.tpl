<tr><td>{$usuario['id']}</td>
  <td>{$usuario['username']}</td>
  {if {$usuario['role']}}
  <td>ADMIN</td>
  {else}
  <td>USER</td>
  {/if}
  <td><button data-id= {$usuario['id']} type="button" class="btn btn-danger">Borrar</button></td>
  {if $usuario['role']}
  <td><button data-id= {$usuario['id']} type="button" class="btn btn-default deleteAdminRole">Quitar admin</button></td>
  {else}
  <td><button data-id= {$usuario['id']} type="button" class="btn btn-default addAdminRole">Agregar admin</button></td>
  {/if}
</tr>
