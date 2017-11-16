$(document).ready(function (){
	"use strict";

   $(document).on("click", "#btnlogin", function (event) {
      	event.preventDefault();
      	loguearse();
   });
	 $(document).on("click", "#btnSignUp", function (event){
		 event.preventDefault();
		 registrarse();
	 });

});

	function redireccion(url){
		var data = {'usuario': $('#usuario').val(), 'password': $('#password').val()};
			$('#usuario').val('');
			$('#password').val('');
			$.ajax({
				type: "POST",
				datatype: "JSON",
				url: url,
				data: data,
				success: function (data) {
					if ($(data).hasClass("giannerHead")){
						$("body").html(data);
					} else {
						$("#contenido").html(data);
					}
				},
				error: function() {
					alert("error al iniciar sesion");
				},
			});
			event.preventDefault();
	}

   function loguearse() {
		 redireccion("route.php?action=verificarUsuario");
	  }

		function registrarse() {
			redireccion("route.php?action=agregarUsuario");
		}
