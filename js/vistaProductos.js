$(document).ready(function(){
  let templateComentarios;
  const COMMENTS_API= "/giannerWeb/api/comments/";
  $.ajax({
      url: 'js/template.mst'
  }).done(template => templateComentarios = template);

  function obtenerComentarios(comentarios,nombre,id,admin,logged) {
  let renderedAllComments = Mustache.render(templateComentarios ,{arreglo:comentarios, nombre_producto:nombre, id_producto:id, admin:admin, logged:logged});
  $("#ComentariosContent").html(renderedAllComments);
  }

  function refresh(dataId, nameId) {
    $.ajax(
      {
        url: COMMENTS_API+dataId,
        type: "GET",
        dataType : "json",
        success : function(data, textStatus) {
          obtenerComentarios(data["param"], nameId, dataId,data["admin"],data["logged"]);
          //setTimeout(refresh(dataId,nameId),20000);
        },
        error: function(jqxml, status, errorThrown){
          console.log(errorThrown);
        }
      }
    );
    $("#formularioProducto").html(IMAGEN_LOADER);
  }
    //Comentar button
    $("#tablaProductos").on('click','.btn-default',function(event) {
       event.preventDefault();
       let dataId =  $(this).data("id");
       let nameId = $(this).data("name");
       refresh(dataId, nameId);
       });

     //POST comentario
     $("#ComentariosContent").on('click','.btn-default',function(event) {
        event.preventDefault();
        let dataId =  $(this).data("id");
        let nameId = $(this).data("name");
        var comentario = {
          "puntaje" :  $("#puntaje").val(),
          "comentario" : $("input[name=comentario]").val()}
          $.ajax(
            {
              url: COMMENTS_API+dataId,
              type: "POST",
              dataType : "json",
              data : JSON.stringify(comentario),
              success : function(data, textStatus) {
                refresh(dataId,nameId);
              },
              error: function(jqxml, status, errorThrown){
                console.log(errorThrown);
              }
            }
          );
          $("#formularioProducto").html(IMAGEN_LOADER);
        });

        //DELETE comment
        $("#ComentariosContent").on('click','.btn-danger',function(event) {
           event.preventDefault();
           let dataId =  $(this).data("id");
           let nameId = $(this).data("name");
           let productId = $(this).data("producto");
             $.ajax(
               {
                 url: COMMENTS_API+dataId,
                 type: "DELETE",
                 dataType : "json",
                 success : function(data, textStatus) {
                   refresh(productId,nameId);
                 },
                 error: function(jqxml, status, errorThrown){
                   console.log(errorThrown);
                 }
               }
             );
             $("#formularioProducto").html(IMAGEN_LOADER);
           });

        $("#formularioComentario").on('click','.btn-default',function(event) {
           event.preventDefault();
           var dataId =  $(this).data("id");
           var nameId = $(this).data("name");
             $.ajax(
               {
                 url: GET_COMMENTS_API+dataId,
                 type: "GET",
                 dataType : "json",
                 success : function(data, textStatus) {
                   obtenerComentarios(data["param"], nameId, dataId,data["admin"],data["logged"]);
                 },
                 error: function(jqxml, status, errorThrown){
                   console.log(errorThrown);
                 }
               }
             );
             $("#formularioProducto").html(IMAGEN_LOADER);
           });

  //Carga Tabla por categoria seleccionada
  $(document).on('change', '#getCategory', function(event) {
   event.preventDefault();
    $.get( "route.php?action=listarXCategoria",{ valCategoria: $(this).val() }, function(data) {
      console.log(data);
      $("#contenidoTabla").html(data);
        $("#ComentariosContent").empty();
      });
  });

})
