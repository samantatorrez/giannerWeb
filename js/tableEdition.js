$( document ).ready(function() {
  const NUMERO_INSTANTANEOS = 3;
  const BASE_URI = "/giannerWeb/";
  const ADD_ACTION_PRODUCT= "agregarProducto";
  const DELETE_PRODUCT_URI= "/giannerWeb/borrarProducto/";
  const GET_ADD_PRODUCT_FORM_URI= "/giannerWeb/obtenerFormularioAgregarProducto";
  const GET_EDIT_PRODUCT_FORM_URI= "/giannerWeb/obtenerFormularioEditarProducto/";
  const ROW_TEMPLATE = "<tr><td>{0}</td><td>{1}</td><td>{2}</td><td>{3}</td><td>{4}</td><td>{5}</td><td><button data-id=\"{0}\"type=\"button\"class=\"btn btn-danger\">Borrar</button></td></tr><tr><td>{0}</td><td>{1}</td><td>{2}</td><td>{3}</td><td>{4}</td><td>{5}</td><td><button data-id=\"{0}\"type=\"button\"class=\"btn btn-default\">Editar</button></td></tr>";
  const EDIT_ACTION_PRODUCT = "editarProducto";
  const IMAGEN_LOADER="<div class=\"text-center\"><img src=\"images\/loader.gif\"  alt=\"loader\"><\/div>";

  $("#formularioProducto").on('click','.cancelar',function(event) {
    quitarFormularioProductos();
  });

  function quitarFormularioProductos() {
    $("#mensajeFormulario").empty();
    $("#formularioProducto").empty();
    $("#agregarProducto").show();
  };

  //Click en submit formulario producto EDIT/AGREGAR
  $("#formularioProducto").submit(function(event){
    event.preventDefault();
    var action = $("#formularioProducto").attr('action');
    let url = BASE_URI + action;
    let form = $(this);
    let serializedData = form.serialize();
    $.ajax({
      url: url,
      type: "POST",
      data : serializedData,
      dataType : "HTML",
      success : function(resultData) {
        if($(resultData).hasClass("alert-danger")){ // si es mensaje de error
          $(mensajeFormulario).html(resultData);
        } else {
          $("#mensajeFormulario").empty();
          if(action == EDIT_ACTION_PRODUCT){
            //obtener el id
            let id = $(resultData).find(".btn-default").data("id");
            //sobrescribir el tr
            $("#tablaProductos").find('[data-id=' + id+ ']').parent().parent().replaceWith(resultData);
          } else {
            //agrega a la tabla
            $("#tablaProductos").append(resultData);
          }
          quitarFormularioProductos();
        }
      },
      error: function(jqxml, status, errorThrown){
         console.log(errorThrown);
      }
    })
  });

  //BORRA un producto
  $("#tablaProductos").on('click','.btn-danger',function(event) {
    event.preventDefault();
    var dataId =  $(this).data("id");
    $.ajax({
      url: DELETE_PRODUCT_URI + dataId,
      type: "DELETE",
      success : function(resultData) {
        if($(resultData).hasClass("alert-danger")){ // si es mensaje de error
          $(mensajeFormulario).html(resultData);
        } else {
          $('[data-id='+dataId+']').parent().parent().remove();
          var submitBtn =$("#formularioProducto").find(":submit");
          //Si esta abierto algun formulario de producto lo cierra
          if (submitBtn.length){
            quitarFormularioProductos();
          }
        }
      },
      error: function(jqxml, status, errorThrown){
         console.log(errorThrown);
      }
    })
  });

  //Muestra el formulario de productos para ser agregados
  $("#agregarProducto").on('click',function(event) {
    event.preventDefault();
    $("#agregarProducto").hide();
      $.ajax(
        {
          url: GET_ADD_PRODUCT_FORM_URI,
          type: "GET",
          dataType : "HTML",
          success : function(data, textStatus) {
            if($(data).hasClass("alert-danger")){ // si es mensaje de error
              quitarFormularioProductos();
              $(mensajeFormulario).html(resultData);
            } else {
              $("#mensajeFormulario").empty();
              $("#formularioProducto").html(data);
              $("#formularioProducto").attr('action', ADD_ACTION_PRODUCT);
            }
          },
          error: function(jqxml, status, errorThrown){
            console.log(errorThrown);
          }
        }
      );
      $("#formularioProducto").html(IMAGEN_LOADER);
  });

  //Muestra el formulario para la edición de un producto
  $("#tablaProductos").on('click','.btn-default',function(event) {
     event.preventDefault();
     $("#agregarProducto").hide();
     var dataId =  $(this).data("id");
       $.ajax(
         {
           url: GET_EDIT_PRODUCT_FORM_URI + dataId ,
           type: "GET",
           dataType : "HTML",
           success : function(data, textStatus) {
             if($(data).hasClass("alert-danger")){ // si es mensaje de error
               quitarFormularioProductos();
               $(mensajeFormulario).html(resultData);
             } else {
               $("#mensajeFormulario").empty();
               $("#formularioProducto").html(data);
               $("#formularioProducto").attr('action', EDIT_ACTION_PRODUCT);
           }
           },
           error: function(jqxml, status, errorThrown){
             console.log(errorThrown);
           }
         }
       );
       $("#formularioProducto").html(IMAGEN_LOADER);
     });
});
