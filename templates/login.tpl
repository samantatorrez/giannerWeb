<section>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <form action="verificarUsuario" method="POST">
        <h2 class="form-signin-heading text-center">Iniciar Sesion</h2>
        <div class="form-group">
          <label for="usuario">Direccion de mail</label>
          <input type="email" class="form-control" id="usuario" name="usuario" placeholder="ejemplo@ejemplo.com" required autofocus>
        </div>
        <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="password" class="form-control" id="password" name ="password" placeholder="Contraseña" required>
        </div>
        {if !empty($error) }
          <div class="alert alert-danger" role="alert">{$error}</div>
        {/if}
        <button type="submit" class="btn btn-lg btn-primary btn-block" id="btnlogin">Acceder</button>
        <div>
          <h5 class="text-center">¿No tienes una cuenta?</h5>
          <a class="btn btn-dark btn-block" href="mostrarRegistrar" id="btnregistrar" name="btnregistrar">Registrese</a>
          <!-- <button type="submit" class="btn btn-dark btn-block" id="btnregistrar" action="registrar">Registrese</button> -->
        </div>
      </form>
    </div>
  </div>
</section>
