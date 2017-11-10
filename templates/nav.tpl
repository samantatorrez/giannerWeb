  <nav class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li id="home" class="active"><a href="#">Home</a></li>
        <li id="producto"><a href="#">Productos</a></li>
        <li id="contacto"><a href="#">Contacto</a></li>
        {if isset($isAdmin)}
        <li id="admin"><a href="#">Administrador</a></li>
        {/if}
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li id="signup"><a href="#">Sign Up</a></li>
        <li id="login"><a href="#">Login</a></li>
      </ul>
    </div>
  </nav>
