$(document).ready(function(){

  //Carga Tabla por categoria seleccionada
  $(document).on('change', '#getCategory', function(event) {
    $.get( "route.php?action=listarXCategoria",{ valCategoria: $(this).val() }, function(data) {
      console.log(data);
      $("#contenidoTabla").html(data);
      });
  });

})


// event.preventDefault();
//   var valCategoria: $(this).val()
//   let form_data = new FormData(this);
//     $.ajax({
//       url: "listarXCategoria",
//       contentType: false,
//       processData: false,
//       data: form_data,
//       type: 'get',
//       success: function(data)
//       {
//         $("#contenidoTabla").html(data);
//       }
//     });
//   return false;
