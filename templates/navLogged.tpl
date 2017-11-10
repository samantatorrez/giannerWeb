<nav class="navbar navbar-inverse navbar-static-top">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li id="home"><a href="#">Home</a></li>
      <li id="producto"><a href="#">Productos</a></li>
      <li id="contacto"><a href="#">Contacto</a></li>
      {if isset($isAdmin)}
      <li id="admin"  class="active"><a href="#">Administrador</a></li>
      {/if}
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <button type="submit" class="btn btn-default login" id="btnlogout">Cerrar Sesion</button>
    </ul>
  </div>
</nav>
