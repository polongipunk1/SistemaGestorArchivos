function obtenerDatosProyecto(idProyecto) {
  $.ajax({
    type: "POST",
    data: "idProyecto=" + idProyecto,
    url: "../procesos/proyectos/obtenerProyecto.php",
    success: function (respuesta) {
      respuesta = jQuery.parseJSON(respuesta);
      //console.log(respuesta);

      $("#idProyecto").val(respuesta["idProyecto"]);
      $("#nomResidenteU").val(respuesta["nomResidente"]);
      $("#emailResidenteU").val(respuesta["emailResidente"]);
      $("#matriculaU").val(respuesta["matricula"]);
      $("#carreraU").val(respuesta["carrera"]);
      $("#nombreCategoria").val(respuesta["categoria"]);
      $("#semestreU").val(respuesta["semestre"]);
      $("#fechaInicioU").val(respuesta["fechaInicio"]);
      $("#fechaTerminoU").val(respuesta["fechaTermino"]);
      $("#nomProyectoU").val(respuesta["nomProyecto"]);
      $("#responsableU").val(respuesta["responsable"]);
      $("#caracteristicasU").val(respuesta["caracteristicas"]);
      $("#objetivoU").val(respuesta["objetivo"]);
      $("#justificacionU").val(respuesta["justificacion"]);
      $("#descripcionU").val(respuesta["descripcion"]);
      $("#nomEmpresaU").val(respuesta["nomEmpresa"]);
      $("#telefonoU").val(respuesta["telefono"]);
      $("#direccionU").val(respuesta["direccion"]);
      $("#emailEmpresaU").val(respuesta["emailEmpresa"]);
    },
  });
}

function eliminarProyecto(idProyecto) {
  idProyecto = parseInt(idProyecto);
  if (idProyecto < 1) {
    swal("No existe un ID de Proyecto");
    return false;
  } else {
    swal({
      title: "¿Esta seguro de eliminar este proyecto?",
      text: "Una vez eliminado no podrá recuperarse.",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          type: "POST",
          data: "idProyecto=" + idProyecto,
          url: "../procesos/proyectos/eliminaProyecto.php",
          success: function (respuesta) {              
            respuesta = respuesta.trim();

            if (respuesta == 1) {
              $("#tablaProyectos").load("proyectos/tablaProyectos.php");
              swal("Proyecto eliminado con éxito", {
                icon: "success",
              });
            } else {
              swal("Error al eliminar proyecto", {
                icon: "error",
              });
            }
          },
        });
      }
    });
  }
}

/*function actualizaProyecto(){
    $.ajax({
        type:"POST",
        data:$('#frmActualizarProyecto').serialize(),
        url:"../procesos/proyectos/actualizaProyecto.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            console.log(respuesta);
            if(respuesta == 1){
                //$('#tablaProyectos').load("proyectos/tablaProyectos.php");
                swal("Proyecto actualizado con éxito!!", "El proyecto se actualizo correctamente", "success"); 
            }else{
                swal("Error al actualizar proyecto", "Debe llenar todos los campos", "error");
            }
        }
    })   
}

function agregarProyecto(){
    var formProyecto = document.getElementById('frmProyectos');
    var datosProyecto = new FormData(formProyecto);

    $.ajax({
        url: "../procesos/proyectos/guardarProyecto.php",
        type:"POST",
        datatype: "html",
        data: datosProyecto,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
            console.log(respuesta);
            respuesta = respuesta.trim();

            if(respuesta == 1){
                $('#frmArchivos')[0].reset();
                //$('#tablaGestorArchivos').load("gestor/tablaGestor.php");
                swal("Proyecto guardado con éxito!!", "El proyecto se ha guardado satisfactoriamente", "success");
            }else{
                swal("Error al guardar el proyecto", "Debe llenar todos los campos", "error");
            }
        }
        });
        return false;
}*/
