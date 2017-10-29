$(document).ready(function(){

  //Carga Tabla por categoria seleccionada
  $(document).on('change', '#getCategory', function(event) {
   event.preventDefault();
    $.get( "route.php?action=listarXCategoria",{ valCategoria: $(this).val() }, function(data) {
      console.log(data);
      $("#contenidoTabla").html(data);
      });
  });

})
