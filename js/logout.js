$(document).ready(function(){

  $(document).on("click","#btnlogout",function(e){
    e.preventDefault();
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
  }
