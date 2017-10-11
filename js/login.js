$(document).ready(function (){
	"use strict";

   $(document).on("click", "#btnlogin", function (e) {
      	e.preventDefault();
      	loguearse();
   });

});

   function loguearse() {
			var data = {'usuario': $('#usuario').val(), 'password': $('#password').val()};
			  $('#usuario').val('');
			  $('#password').val('');
			  $.ajax({
					type: "POST",
					datatype: "JSON",
					url: "route.php?action=admin",
					data: data,
					success: function (data) {
			      $("#contenido").html(data);
					},
					error: function() {
				    alert("error al iniciar sesion");
					},
			  });
	  }
