/*****Función para agregar nueva categoria******/
function agregarCategoria() {
  var categoria = $("#nombreCategoria").val();
  if (categoria == "") {
    swal("Debes agregar una categoría");
    return false;
  } else {
    $.ajax({
      type: "POST",
      data: "categoria=" + categoria,
      url: "../procesos/categorias/agregarCategoria.php",
      success: function (respuesta) {
        respuesta = respuesta.trim();
        if (respuesta == 1) {
          $("#tablaCategorias").load("categorias/tablaCategoria.php");
          $("#nombreCategoria").val("");
          swal(
            "Categoría agregada con éxito",
            "Se ha agregado una nueva categoría",
            "success"
          );
        } else {
          swal("Error al agregar categoría", "Verifique los datos", "error");
        }
      },
    });
  }
}
/*****Función para eliminar categoria*****/
function eliminarCategoria(idCategoria) {
  idCategoria = parseInt(idCategoria);
  if (idCategoria < 1) {
    swal("No existe un ID de Categoría");
    return false;
  } else {
    /*Alerta para corroborar la eliminacion de la CATEGORIA*/
    swal({
      title: "¿Desea eliminar esta categoría?",
      text: "Una vez eliminada, no podrá recuperarse.",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          type: "POST",
          data: "idCategoria=" + idCategoria,
          url: "../procesos/categorias/eliminarCategoria.php",
          success: function (respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
              $("#tablaCategorias").load("categorias/tablaCategoria.php");
              swal("Eliminado con éxito!", {
                icon: "success",
              });
            } else {
              swal(
                "Error al eliminar categoría",
                "Esta categoría contiene archivos, por seguridad no se puede eliminar",
                "error"
              );
            }
          },
        });
      }
    });
  }
}
/***Función para EDITAR categoría***/
function obtenerDatosCategoria(idCategoria) {
  $.ajax({
    type: "POST",
    data: "idCategoria=" + idCategoria,
    url: "../procesos/categorias/obtenerCategoria.php",
    success: function (respuesta) {
      respuesta = jQuery.parseJSON(respuesta);

      $("#idCategoria").val(respuesta["idCategoria"]);
      $("#categoriaU").val(respuesta["nombreCategoria"]);
    },
  });
}

function actualizaCategoria() {
  if ($("#categoriaU").val() == "") {
    swal("Debe ingresar un nombre de categoría");
    return false;
  } else {
    $.ajax({
      type: "POST",
      data: $("#frmActualizaCategoria").serialize(),
      url: "../procesos/categorias/actualizaCategoria.php",
      success: function (respuesta) {
        respuesta = respuesta.trim();

        if (respuesta == 1) {
          $("#tablaCategorias").load("categorias/tablaCategoria.php");
          swal(
            "Actualizado correctamente!!",
            "Se ha modificado con exito la categoría",
            "success"
          );
          $("#btnCerrarUpdateCategoria").click();
        } else {
          swal("Error al modificar", "Verifique el campo", "error");
        }
      },
    });
  }
}
