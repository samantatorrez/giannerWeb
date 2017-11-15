<section>
  <div class="container">
    <form class="form-signin" action="registrar" id ="registrarForm" method="POST" enctype="multipart/form-data">
      <h2 class="form-signin-heading">Registrarse</h2>
      <p>
        <label for="inputEmail" class="sr-only">Direccion de mail</label>
        <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="ejemplo@ejemplo.com" required autofocus>
      </p>
      <p>
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Contraseña" required>
      </p>
      <p>
       <label for="inputRol" class="sr-only">Rol</label>
       <select id="inputRol"  name="inputRol" class="form-control">
         <option>Seleccione un rol</option>
         <option>Administrador</option>
         <option>Usuario</option>
       </select>
     </p>
      <button class="btn btn-lg btn-danger btn-block" type="submit" id="registrar" name="registrar">Registrar</button>
      {if isset($error)}
        <div class="panel panel-filled panel-c-danger">
          <div class="panel-heading">{$error}</div>
        </div>
      {/if}
    </form>
  </div> <!-- /container -->
</section>
