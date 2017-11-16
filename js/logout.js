$(document).ready(function(){

  $(document).on("click","#btnlogout",function(event){
    event.preventDefault();
    cerrarSesion() ;
  });

});

  function cerrarSesion() {
    $.ajax({
      method: 'POST',
      url:'route.php?action=logout',
      success: function(data){
        $("body").html(data);
      },
      error: function () {
        alert('Error al cerrar sesion.');
      },
    });
    event.preventDefault();
  }
