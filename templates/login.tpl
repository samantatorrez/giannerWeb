<section>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <form action="verificarUsuario" method="POST">
        <h2 class="form-signin-heading text-center">Iniciar Sesion</h2>
        <div class="form-group">
          <label for="usuario">Usuario</label>
          <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Nombre de usuario" required autofocus>
        </div>
        <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="password" class="form-control" id="password" name ="password" placeholder="Contraseña" required>
        </div>
        {if !empty($error) }
          <div class="alert alert-danger" role="alert">{$error}</div>
        {/if}
        <button type="submit" class="btn btn-default" id="btnlogin">Acceder</button>
      </form>
    </div>
  </div>
</section>
