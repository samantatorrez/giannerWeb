
  <h2 class="text-center">{$productFormAction}</h2>
  {if $isOnEdition}
    <div class="form-group">
      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" class="form-control" value={$product['nombre']}>
    </div>
    <div class="form-group">
      <label for="medidas">Medidas:</label>
      <input type="text" name="medidas" class="form-control" value={$product['medidas']}>
    </div>
    <div class="form-group">
      <label for="precio">Precio:</label>
      <input type="number" name="precio" class="form-control" value={$product['precio']}>
    </div>
    <div class="form-group">
      <label for="id_categoria">Categoria:</label>
      <select name="id_categoria" class="form-control">
        {foreach from=$categorias item=categoria}
        <option value= {$categoria['id']} {if $categoria['id'] eq $product['id_categoria']}selected{/if}>{$categoria['nombre']}</option>
        {/foreach}
      </select>
    </div>
    <div class="form-group">
      <label for="descripcion">Descripción</label>
      <textarea class="form-control" name="descripcion" rows="3" >{$product['descripcion']}</textarea>
    </div>
    <div class="form-group">
      <label for="imagen">Imagen</label>
      <div class="slide">
        {foreach from=$product['imagenes'] item=imagen}
          <img src="{$imagen['ruta']}" alt="producto" class="img-responsive img-rounded">
        {/foreach}
      </div>
      <input type="file" id="imagenes" name="imagenes[]" multiple>
    </div>
  {else}
    <div class="form-group">
      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" class="form-control" >
    </div>
    <div class="form-group">
      <label for="medidas">Medidas:</label>
      <input type="text" name="medidas" class="form-control">
    </div>
    <div class="form-group">
      <label for="precio">Precio:</label>
      <input type="number" name="precio" class="form-control">
    </div>
    <div class="form-group">
      <label for="id_categoria">Categoria:</label>
      <select name="id_categoria" class="form-control">
        {foreach from=$categorias item=categoria}
        <option value= {$categoria['id']} >{$categoria['nombre']}</option>
        {/foreach}
      </select>
    </div>
    <div class="form-group">
      <label for="descripcion">Descripción</label>
      <textarea class="form-control" name="descripcion" rows="3"></textarea>
    </div>
    <div class="form-group">
      <label for="imagen">Imagen</label>
      <input type="file" id="imagenes" name="imagenes[]" multiple>
    </div>
  {/if}
  <button type="submit" class="btn btn-default">{$productFormAction}</button>
  <button type="button" class="btn cancelar btn-default">Cancelar</button>
