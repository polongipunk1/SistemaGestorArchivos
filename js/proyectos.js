function obtenerDatosProyecto(idProyecto){
    $.ajax({
        type:"POST",
        data:"idProyecto=" + idProyecto,
        url:"../procesos/proyectos/obtenerProyecto.php",
        success:function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            
            console.log(respuesta);

            $('#nomResidenteU').val(respuesta['nomResidente']);
            $('#emailResidenteU').val(respuesta['emailResidente']);
            $('#matriculaU').val(respuesta['matricula']);            
            $('#carreraU').val(respuesta['carrera']);
            $('#categoriasLoadU').val(respuesta['categoria']);
            $('#semestreU').val(respuesta['semestre']);
            $('#fechaInicioU').val(respuesta['fechaInicio']);
            $('#fechaTerminoU').val(respuesta['fechaTermino']);
            $('#nomProyectoU').val(respuesta['nomProyecto']);
            $('#responsableU').val(respuesta['responsable']);
            $('#caracteristicasU').val(respuesta['caracteristicas']);
            $('#objetivoU').val(respuesta['objetivo']);
            $('#justificacionU').val(respuesta['justificacion']);
            $('#descripcionU').val(respuesta['descripcion']);
            $('#nomEmpresaU').val(respuesta['nomEmpresa']);
            $('#telefonoU').val(respuesta['telefono']);
            $('#direccionU').val(respuesta['direccion']);
            $('#emailEmpresaU').val(respuesta['emailEmpresa']);            
        }
    });
}



/*function agregarProyecto(){
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