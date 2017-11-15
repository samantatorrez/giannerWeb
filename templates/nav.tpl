  <nav class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li id="home" {if !isset($isAdminTab)}class="active"{/if}><a href="#">Home</a></li>
        <li id="producto"><a href="#">Productos</a></li>
        <li id="contacto"><a href="#">Contacto</a></li>
        {if isset($isAdmin) && $isAdmin}
        <li id="admin"{if isset($isAdminTab)}class="active"{/if}><a href="#">Administrador</a></li>
        {/if}
      </ul>

      <ul class="nav navbar-nav navbar-right">
        {if isset($isLogged) && $isLogged}
          <li>
            <button type="submit" class="btn btn-default login" id="btnlogout">Cerrar Sesion</button>
          </li>
        {else}
          <li id="signup"><a href="#">Sign Up</a></li>
          <li id="login"><a href="#">Login</a></li>
        {/if}
      </ul>
      {if isset($isLogged) && $isLogged}
        <span class="navbar-text center-block navbar-right">{$getUser}</span>
      {/if}
    </div>
  </nav>
