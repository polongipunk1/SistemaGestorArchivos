function agregarArchivosGestor() {
  var formData = new FormData(document.getElementById("frmArchivos"));
  /*console.log(formData.get('categoriasArchivos'));
    console.log(formData.get('archivos[]'));
    console.log(formData.get('archivos[]').size);*/
  $.ajax({
    url: "../procesos/gestor/guardarArchivos.php",
    type: "POST",
    datatype: "html",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      //console.log(respuesta);
      //console.log(formData.get("archivos[]").size);
      respuesta = respuesta.trim();

      if (respuesta == 1) {
        $("#frmArchivos")[0].reset();
        $("#tablaGestorArchivos").load("gestor/tablaGestor.php");
        swal(
          "Archivo agregado con éxito",
          "El archivo se ha subido satisfactoriamente",
          "success"
        );
      }else if(respuesta == 2){
        swal("Este archivo ya existe, por favor renómbrelo","","warning");
      } else if (formData.get("categoriasArchivos") == null) {
        swal("No hay categoría seleccionada","","warning");
      } else if (formData.get("archivos[]").size > 505561499) {        
        swal("Tamaño de archivo demasiado grande","","error");
      } else {
        swal(
          "Error al agregar archivo",
          "Ambos campos no deben ser nulos",
          "error"
        );
      }
    },
  });
}

function eliminarArchivo(idArchivo) {
  swal({
    title: "¿Esta seguro de eliminar este archivo?",
    text: "Una vez eliminado no podrá recuperarse.",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      $.ajax({
        type: "POST",
        data: "idArchivo=" + idArchivo,
        url: "../procesos/gestor/eliminaArchivo.php",
        success: function (respuesta) {
          respuesta = respuesta.trim();

          if (respuesta == 1) {
            $("#tablaGestorArchivos").load("gestor/tablaGestor.php");
            swal("Eliminado con éxito","", {
              icon: "success",
            });
          } else {
            swal("Error al eliminar","", {
              icon: "error",
            });
          }
        },
      });
    }
  });
}

function obtenerArchivoPorId(idArchivo) {
  $.ajax({
    type: "POST",
    data: "idArchivo=" + idArchivo,
    url: "../procesos/gestor/obtenerArchivo.php",
    success: function (respuesta) {
      $("#archivoObtenido").html(respuesta);
    },
  });
}
