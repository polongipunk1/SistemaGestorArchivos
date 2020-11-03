function agregarArchivosGestor(){
    var formData = new FormData(document.getElementById('frmArchivos'));
        $.ajax({
        url:"../procesos/gestor/guardarArchivos.php",
        type:"POST",
        datatype: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
            console.log(respuesta);
            respuesta = respuesta.trim();

            if(respuesta == 1){
                $('#frmArchivos')[0].reset();
                $('#tablaGestorArchivos').load("gestor/tablaGestor.php");
                swal("Archivo agregado con éxito","El archivo se ha subido satisfactoriamente","success");
            }else{
                swal("Error al agregar archivo","Hubo un error en la subida del archivo","error");
            }
        }
        });
}

function eliminarArchivo(idArchivo){
    swal({
        title: "¿Esta seguro de eliminar este archivo?",
        text: "Una vez eliminado no podrá recuperarse.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type:"POST",
                data:"idArchivo=" + idArchivo,
                url:"../procesos/gestor/eliminaArchivo.php",
                success:function(respuesta){
                    respuesta = respuesta.trim();

                    if(respuesta == 1){
                        $('#tablaGestorArchivos').load("gestor/tablaGestor.php");
                        swal("Eliminado con éxito", {
                            icon: "success",
                          });
                    }else{
                        swal("Error al eliminar", {
                            icon: "error",
                          });
                    }                    
                }
            });          
        }
      });
}