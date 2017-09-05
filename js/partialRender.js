$( document ).ready(function() {
    const IMAGEN_LOADER="<div class=\"text-center\"><img src=\"images\/loader.gif\"  alt=\"loader\"><\/div>";
     function actualizarContenido(url){
       $.ajax({
         url: url,
         type: "GET",
         dataType : "HTML",
         success : function(data, textStatus) {
           $("#contenido").html(data);
         }
       })
       $("#contenido").html(IMAGEN_LOADER);
     };

    $("li").click(function(event) {
          event.preventDefault();
          $("li").removeClass("active");
          $(this).addClass("active");
    });

    $("#home").on('click', function(event) {
      event.preventDefault();
      actualizarContenido("presentacion.html");
    });
    $("#contactos").on('click', function(event) {
      event.preventDefault();
      actualizarContenido("contactos.html");
    });
    $("#productos").on('click', function(event) {
      event.preventDefault();
      actualizarContenido("productos.html");
    });

    actualizarContenido("presentacion.html");
});
