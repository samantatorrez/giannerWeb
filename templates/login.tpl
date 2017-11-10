
    <div id="contenido">
      <section>
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <form action="verificarUsuario" method="POST">
              {if $isSignUp}
              <h2 class="form-signin-heading text-center">Registrarse</h2>
              {else}
              <h2 class="form-signin-heading text-center">Iniciar Sesion</h2>
              {/if}
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
              {if $isSignUp}
              <button type="submit" class="btn btn-default login" id="btnSignUp">Registrar</button>
              {else}
              <button type="submit" class="btn btn-default login" id="btnlogin">Acceder</button>
              {/if}
            </form>
          </div>
        </div>
      </section>
    </div>
