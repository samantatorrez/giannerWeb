$( document ).ready(function() {
  const GRUPO= "16";
  const NUMERO_INSTANTANEOS = 3;
  const DEFAULT_URI= "https://web-unicen.herokuapp.com/api/thing";
  const GET_PRODUCTO_URI= DEFAULT_URI + "/group/";
  const ROW_TEMPLATE = "<tr><td>{0}</td><td>{1}</td><td>{2}</td><td><button data-id=\"{3}\"type=\"button\"class=\"btn btn-danger\">Borrar</button></td></tr>";

  function obtenerProductoNuevo(){
    let producto={};
    let form =$("#nuevoProducto").serializeArray();
    let elemento;
    for (let i = 0; i < form.length; i++) {
      elemento = form[i];
      producto[elemento.name]= elemento.value;
    };
    return producto;
  };
  function refrescarTabla(){
    $.ajax({
      url: GET_PRODUCTO_URI+GRUPO,
      type: "GET",
      dataType : "JSON",
      success : function(data, textStatus) {
        for (let i = 0; i < data.information.length; i++) {
          let producto= data.information[i];
          let nuevaFila = ROW_TEMPLATE.replace('{0}',producto.thing.nombre).replace('{1}',producto.thing.medida).replace('{2}',producto.thing.precio).replace('{3}',producto["_id"]);
          $("#tablaProductos").append(nuevaFila);
        };
      },
      error: function(jqxml, status, errorThrown){
         console.log(errorThrown);
      }
    })
  };
  function guardarProducto(data){
    $.ajax({
      url: DEFAULT_URI,
      type: "POST",
      contentType: "application/json; charset=utf-8",
      dataType : "JSON",
      data : JSON.stringify(data),
      success : function(resultData) {
        let producto= resultData.information;
        let nuevaFila = ROW_TEMPLATE.replace('{0}',producto.thing.nombre).replace('{1}',producto.thing.medida).replace('{2}',producto.thing.precio).replace('{3}',producto["_id"]);
        $("#tablaProductos").append(nuevaFila);
      },
      error: function(jqxml, status, errorThrown){
         console.log(errorThrown);
      }
    })
  };
  function editarProducto(data){
    $.ajax({
      url: DEFAULT_URI,
      type: "PUT",
      contentType: "application/json; charset=utf-8",
      dataType : "JSON",
      data : JSON.stringify(data),
      success : function(resultData) {
        let producto= resultData.information;
        let nuevaFila = ROW_TEMPLATE.replace('{0}',producto.thing.nombre).replace('{1}',producto.thing.medida).replace('{2}',producto.thing.precio).replace('{3}',producto["_id"]);
        $("#tablaProductos").append(nuevaFila);
      },
      error: function(jqxml, status, errorThrown){
         console.log(errorThrown);
      }
    })
  };

  $("#agregarPrecio").click(function(event) {
    event.preventDefault();
    let producto = obtenerProductoNuevo();
    let data = {
                group: GRUPO,
                thing: producto
                };
    guardarProducto(data);
  });
  $("#agregarInstantaneo").click(function(event) {
    event.preventDefault();
    for (let i = 0; i < NUMERO_INSTANTANEOS; i++) {
      let unico = new Date().getTime();
      let producto = {
        nombre : "mochilaBot_"+unico,
        medida : "10 x 10 cm",
        precio : "$300"
      };
      let data = {
                  group: GRUPO,
                  thing: producto
                  };
      guardarProducto(data);
    }
  });
  $("#tablaProductos").on('click','.btn-danger',function(event) {
    event.preventDefault();
    let dataId =  $(this).data("id");
    $.ajax({
      url: DEFAULT_URI +"/" + dataId,
      type: "DELETE",
      dataType : "JSON",
      success : function(resultData) {
        $('[data-id='+dataId+']').parent().parent().remove();
      },
      error: function(jqxml, status, errorThrown){
         console.log(errorThrown);
      }
    })
  });

});
