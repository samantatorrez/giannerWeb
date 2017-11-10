$(document).ready(function() {
  "use strict";

  function MostrarError(){
    $("#contenido").html("SE CAYO LA RED.");
  }

  const IMAGEN_LOADER="<div class=\"text-center\"><img src=\"images\/loader.gif\"  alt=\"loader\"><\/div>";
  function actualizarContenido(event){
     event.preventDefault();
    var myId = $(this).attr("id"); //Toma el valor del id que esta en el nav
    $("li").removeClass("active");
    $(this).addClass("active");
    $.ajax(
      {
        url: 'route.php?action=' + myId,
        type: "GET",
        dataType : "HTML",
        success : function(data, textStatus) { // Si la solicitud tuvo exito, mostrará el contenido en la pagina
          if ($(data).hasClass("giannerHead")){
            $("body").html(data);
          } else {
            $("#contenido").html(data);
          }

        },
        error: MostrarError //sino muestra el error
      }
    );
    $("#contenido").html(IMAGEN_LOADER);
    event.preventDefault();
  };

  $("li").on("click",actualizarContenido);

});
