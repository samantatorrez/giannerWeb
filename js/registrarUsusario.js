$(document).ready(function(){
		"use strict";

	$(document).on("click","#btnregistrar",function(event){
	  event.preventDefault();
    alert('entro');
	  mostrarRegistrar();
	});

});

  function mostrarRegistrar(){
    $.ajax({
      method: 'POST',
      url:'route.php?action=mostrarRegistrar',
      success: function(data){
        $("#contenido").html(data);
      },
      error: function () {
        alert('Error al ir a registrar');
      },
    });
  }

//  $(document).on("submit","#registrarForm", function(event){
// 			 event.preventDefault();
// 			 var formData = new FormData(this);
// 			 $.ajax({
// 				 method:'POST',
// 				 url: "index.php?page=registrar",
// 				 dataType: "HTML",
// 				 data: formData,
// 				 contentType: false,
// 				 cache: false,
// 				 processData:false,
// 				 success: function(data){ // Si la solicitud tuvo exito, mostrará el contenido en la pagina y
// 					 $('#contenido').html(data);
// 					 $('#inputEmail').val('');
// 					 $('#inputPassword').val('');
// 					 $('#inputRol').val('');
// 				 },
// 				 error: function () {
// 					 alert('Error al ir cargar datos');
// 				 },
// 			 });
// 		 });
// });
